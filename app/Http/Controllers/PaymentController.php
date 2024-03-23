<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Video;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getVnpPage(Request $request)
    {
        $href = $request->v;
        $video = Video::where('href', $href)->first();
        $now = now(config('constants.DEFAULT_ZONE'));
        $vnp_CreateDate = $now->format('YmdHis');
        $vnp_ExpireDate = $now->addMinutes(15)->format('YmdHis');
        $vnp_TxnRef = $this->generateRandomNumberString(8);

        $returnUrl = config('vnp.vnp_ReturnUrl') . '?v=' . $href;

        $inputData = [
            "vnp_Version" => config('vnp.vnp_Version'),
            "vnp_TmnCode" => config('vnp.vnp_TmnCode'),
            "vnp_Amount" => $video->price * 100,
            "vnp_Command" => config('vnp.vnp_CommandPay'),
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $request->ip(),
            "vnp_Locale" => 'vn',
            "vnp_OrderInfo" => "Thanh toan don hang: " . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $returnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
            "vnp_BankCode" => "NCB"
        ];

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = config('vnp.vnp_Url') . "?" . $query;
        $vnp_HashSecret = config('vnp.vnp_HashSecret');
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect()->away($vnp_Url);
    }

    public function vnpReturn(Request $request){
        $href = $request->v;
        $vnp_TxnRef = $request->vnp_TxnRef;
        $vnp_OrderInfo = $request->vnp_OrderInfo;
        $vnp_PayDate = $request->vnp_PayDate;
        $vnp_ResponseCode = $request->vnp_ResponseCode;
        $vnp_Amount = $request->vnp_Amount;
        $vnp_BankCode = $request->vnp_BankCode;
        $vnp_TransactionNo = $request->vnp_TransactionNo;

        $price = intval($vnp_Amount)/100;

        $video = Video::where('href', $href)->first();
        $user = $request->user();

        Order::create([
            'vnp_TxnRef' => $vnp_TxnRef,
            'vnp_OrderInfo' => $vnp_OrderInfo,
            'vnp_PayDate' => $vnp_PayDate,
            'vnp_ResponseCode' => $vnp_ResponseCode,
            'vnp_Amount' => $price,
            'vnp_BankCode' => $vnp_BankCode,
            'vnp_TransactionNo' => $vnp_TransactionNo,
            'userId' => $user->id,
            'videoId' => $video->id
        ]);
        return redirect()->route('video.details', ['v' => $href])->with([
            'paySuccess' => true
        ]);        
    }
  
    public function generateRandomNumberString($length) {
        $characters = '0123456789';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }
}
