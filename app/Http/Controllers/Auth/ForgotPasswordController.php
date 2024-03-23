<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Mail;
use DateTime;
use Carbon\Carbon;
use App\Models\Password_reset;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showForgotPassPage(){
        return view('web.forgot-password');
    }

    public function showEnterOTPPage(){
        return view('web.enter-otp');
    }
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
        ]);
        if ($validator->fails()) {
            // Email đã tồn tại
            $otp = rand(100000,999999);
            $user = new User();
            $user->email = $request->email;
            $passwordReset =Password_reset::updateOrCreate(
                ['email' => $request->email],
                [
                'token' => $otp,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
                ]
            );

            $user_name = User::where('email', $request->email)->first();
            $name = $user_name->fullname;
            $data['email'] = $user->email;
            $data['title'] = 'Mail Verification';
            $data['otp'] = $otp;
            $data['name'] = $name;

            Mail::send('mail.changePasswordMail',['data'=>$data],function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            return redirect()->route('showEnterOTPPage')->with('otp-sent','sent');
        } else {
            //email chưa được đăng ký
            return redirect()->back()->with('not_existed_email','Email khong ton tai');
        }
        
    }

    public function verifiedOtp(Request $request)
    {
        $otpData = Password_reset::where('token',$request->otp)->first();
        if(!$otpData){
            return redirect()->route('showEnterOTPPage')->with('wrong-otp','You entered wrong OTP');
        }
        else{
            //kiểm tra nếu OTP gửi dưới 3 phút
            $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
            $time = $otpData->created_at;
            $dt = $currentTime -> diffInSeconds($time);
            $email = $otpData->email;
            if($dt <= 180){
                session(['success-otp' => $email]);
                Password_reset::where('token',$request->otp)->delete();
                return redirect()->route('showNewPassPage');
            }
            else{
                return redirect()->route('showEnterOTPPage')->with('expired-otp','Your OTP is expired');;
            }

        }
    }
}
