<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\History;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function get_currency(){
        return '₫';
    }
    public function format_money($amount, $currency=false){
        if($currency){
            return number_format($amount, 0, '.', '.'). ''. $this->get_currency();
        }
        return number_format($amount, 0, '.', '.');
    }
    public function showTransaction(){
        
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $userId = Auth::id();
        $video = Video::get();
        $data = DB::table('orders')
            ->join('videos', 'orders.videoId', '=', 'videos.id')
            ->select('orders.*', 'videos.href')
            ->where('userId',$userId)
            ->orderBy('vnp_PayDate','desc')
            ->paginate(5);
        $currentPage = $data->currentPage();
        $index = ($currentPage - 1) * $data->perPage() + 1;
        foreach($data as $row){
            $row->vnp_Amount = $this->format_money($row->vnp_Amount, true);
        }
        
        return view('web.transaction',[
            'now'=> $now,
            'data' => $data,
            'index' => $index,
        ]);
    }

    
    public function showProfile(){
        return view('profile.profile');
    }

    public function showFrmProfile(){
        return view('profile.editProfile');
    }

    public function showFrmChangePass(){
        return view('profile.changePass');
    }

    public function changePass(Request $request){
        //Lấy thông tin về người dùng hiện tại đã đăng nhập
        $user = $request->user();

        if($user->password != $request->oldPass){

        }
        //Cập nhật mật khẩu mới
        $user->password = bcrypt($request->newPass);
        $user->save();
        return redirect()->route('showProfile')->with('change_success', 'Thay đổi mật khẩu thành công.');
        
    }

    // Phương thức để xử lý việc cập nhật thông tin người dùng
    public function editProfile(Request $request)
    {
        
        // Lấy thông tin về người dùng hiện tại đã đăng nhập
        $user = $request->user();
            // Cập nhật thông tin người dùng
            $user->fullname = $request->fullname;
            $user->phone = $request->phone;
            $user->save(); // Lưu lại các thay đổi vào cơ sở dữ liệu

            return redirect()->route('showProfile')->with('update_success', 'Cập nhật thông tin thành công.');
        
    }

    public function showFavorites(Request $request)
    {
        // Lấy user ID từ request hoặc session
        $userId = $request->user()->id; // Sử dụng user ID từ request

        // Tìm tất cả các video ID trong bảng histories chứa các phim đã thích từ người dùng với isLike = 1
        $videoIds = History::where('userId', $userId)
                           ->where('isLiked', 1)
                           ->pluck('videoId');

        // Tìm các video từ bảng videos với các video ID đã tìm thấy
        $videos = Video::whereIn('id', $videoIds)
                       ->select('videos.*')
                       ->get();

        // Chuyển hướng sang trang favorites và truyền các đối tượng đã được lọc
        return view('profile.favorites')->with('videos', $videos);
    }
    
}
