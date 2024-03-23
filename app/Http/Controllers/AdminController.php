<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Video;
use App\Models\Category;
use App\Models\History;
use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function __construct(){
    $this->middleware(['auth', 'role:admin'], ['except' => ['index', 'login']]);
}


    //
    public function index(){
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $this->debug_to_console("55555");
            // Kiểm tra nếu người dùng có roleId = 1
            if (Auth::user()->roleId == 1) {
                $this->debug_to_console("33333");
                // Người dùng có roleId = 1 đăng nhập thành công, chuyển hướng đến trang dashboard
                return redirect()->route('admin.dashboard');
            } else {
                $this->debug_to_console("44444");
                // Người dùng không có roleId = 1, đăng xuất và hiển thị thông báo lỗi
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Tài khoản của bạn không có quyền truy cập vào trang admin.');
            }
        }

        // Đăng nhập không thành công, hiển thị thông báo lỗi và chuyển hướng về trang đăng nhập
        return redirect()->route('admin.login')->with('error', 'Email hoặc mật khẩu không chính xác.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // Người dùng thích
    public function userLiked(Request $request)
    {
        // Lấy danh sách video
        $videos = Video::whereIn('id', function($query) {
            $query->select('videoId')->from('histories')->where('isLiked', true);
        })->get();

        // Lọc danh sách người dùng dựa trên bộ phim được chọn
        $selectedVideoId = $request->input('href');
        $users = [];
        if ($selectedVideoId) {
            $users = History::select('users.*')
                        ->join('users', 'histories.userId', '=', 'users.id')
                        ->where('videoId', $selectedVideoId)
                        ->distinct()
                        ->get();
        }

        return view('admin.user_liked', compact('videos', 'users'));
    }


    // Lượt thích từng phim
    public function likedVideoList(Request $request){
        // tính số lượt thích của từng phim
        $videos = Video::select('videos.id', 'videos.title', 'videos.director', 'videos.isActive')
                    ->selectRaw('COUNT(histories.id) AS total_likes')
                    ->leftJoin('histories', function ($join) {
                        $join->on('videos.id', '=', 'histories.videoId')
                             ->where('histories.isLiked', '=', 1);
                    })
                    ->groupBy('videos.id', 'videos.title', 'videos.director', 'videos.isActive')
                    ->orderByDesc('total_likes')
                    ->paginate(10);

        $currentPage = $videos->currentPage();
        $maxPage = $videos->lastPage();
    
        return view('admin.liked_videos', compact('videos','currentPage', 'maxPage'));
    }

    // Show form update người dùng
    public function updateUserForm($id){
        $user = User::find($id);

        return view('admin.update_user', compact('user'));
    }

    // Update người dùng
    public function updateUser(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required',
                'fullname' => 'required',
                'isActive' => 'required|in:0,1',
                'phone' => 'required',
                'roleId' => 'required|in:1,2',
            ]);
            $this->console_to_debug($validatedData);
            $this->console_to_debug('Heyyyyyyyyyyyyyyyyyyyyyyyyyy');

            $user = User::findOrFail($id);
            $user->update($validatedData);

            return redirect()->route('admin.users')->with('updateUserSuccess', 'Cập nhật người dùng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật người dùng: ' . $e->getMessage());
        }
    }

    // Danh sách người dùng
    public function showUserList(Request $request){
        $users = User::paginate(10);
        return view('admin.user_list', compact('users'));
    }


    // Show disabled list
    public function disabledList(Request $request){
        $videos = Video::where('isActive', 0)
                        ->orderBy('createdAt', 'desc')
                        ->paginate(10);
        return view('admin.disabled_videos', compact('videos'));
    }

    // Khôi phục video
    public function restore(Request $request)
    {
        $videoId = $request->input('id');

        $video = Video::find($videoId);
        if ($video) {
            $video->update(['isActive' => 1]);
        }

        return redirect()->back()->with('restoreVideoSuccess', true);
    }

    // Xóa video -  chuyển sang ngừng công chiếu
    public function deactivateVideo($id)
    {
        try {
            $video = Video::findOrFail($id);
            $video->isActive = 0;
            $video->save();

            $this->debug_to_console('Xóa thành công');

            return redirect()->back()->with('success', 'Video đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xóa video: ' . $e->getMessage());
        }
    }


    // Show form sửa phim
    public function editVideoForm($id){
        $video = Video::find($id);
        $categories = Category::all();
        $price = $video->price;
        $formattedPrice = number_format($price, 0, ',', '.'); //format lại hiển thị giá tiền

        return view('admin.edit_video', ['formattedPrice' => $formattedPrice], compact('video', 'categories'));
    }

    // Sửa phim
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'href' => 'required',
                'director' => 'required',
                'actor' => 'required',
                'categoryId' => 'required',
                'price' => 'required',
                'description' => 'required',
            ]);

            $video = Video::findOrFail($id);
            $video->update($validatedData);

            return redirect()->route('admin.video.edit', $id)->with('updateVideoSuccess', 'Chỉnh sửa video thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật video: ' . $e->getMessage());
        }
    }


    // Show form thêm phim
    public function addVideoForm()
    {
        $categories = Category::all();
        return view('admin.add_video', compact('categories'));
    }

    // Thêm phim mới
    public function addVideo(Request $request)
    {
        try {
            // Validate dữ liệu input 
            $validatedData = $request->validate([
                'title' => 'required',
                'href' => 'required',
                'director' => 'required',
                'actor' => 'required',
                'categoryId' => 'required',
                'description' => 'required',
                'price' => 'required',
                'poster' => 'required',
            ]);
            
            $validatedData['share'] = 0;
            $validatedData['view'] = 0;
            // Lưu vào DB
            Video::create($validatedData);

            return redirect()->route('admin.video.add')->with('success', 'Phim đã được thêm thành công!');

        } catch (\Exception $e) {
            // Thông báo lỗi nếu có
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm phim: ' . $e->getMessage());
        }
    }

    // Danh sách phim
    public function showVideoList(){
        $videos = Video::where('isActive', true)->orderBy('createdAt', 'desc')->paginate(10); // Lấy danh sách video với mỗi trang có 10 video
        return view('admin.video_list', compact('videos'));
    }


    // Vào dashboard
    public function showDashboard(){
        
        $recentTransactions = $this->recentTransactions();
        $yearlyRevenue = $this->yearlyRevenue();
        $monthlyRevenue = $this->monthlyRevenue();

        // Lấy thông tin của người dùng liên quan đến mỗi giao dịch
        $transactionsDetails = [];
        foreach ($recentTransactions as $transaction) {
            $user = User::find($transaction->userId);
            $transaction->user = $user; // Gán thông tin người dùng vào giao dịch
            $transactionsDetails[] = $transaction;
        }

        return view('admin.admin_dashboard', compact('recentTransactions', 'transactionsDetails', 'yearlyRevenue', 'monthlyRevenue'));
    }


    // Tính doanh thu hàng năm
    public function yearlyRevenue()
    {
        $yearlyRevenue = DB::table('orders')
            ->select(DB::raw('SUM(vnp_Amount) as totalYearRevenue'))
            // ->whereYear('vnp_PayDate', 2023)
            ->whereYear('vnp_PayDate', date('Y'))
            ->first();

        return $yearlyRevenue;
    }

    // Tính doanh thu hàng tháng
    public function monthlyRevenue(){
        $monthlyRevenue = DB::table('orders')
            ->select(DB::raw('SUM(vnp_Amount) as totalMonthRevenue'))
            // ->whereYear('vnp_PayDate', 2023)
            ->whereYear('vnp_PayDate', date('Y'))
            ->whereMonth('vnp_PayDate', date('m'))
            ->first();

        return $monthlyRevenue;
    }


    // Lấy ra 5 giao dịch gần đây, thời gian giảm dần
    public function recentTransactions()
    {
        $recentTransactions = Order::orderBy('vnp_PayDate', 'desc')->take(5)->get();

        return $recentTransactions;
    }

    // test kết nối DB
    public function testDB(){
        try {
            DB::connection()->getPdo();
            echo "Connected successfully to database.";
        } catch (\Exception $e) {
            die("Could not connect to the database: " . $e->getMessage());
        }
    }

    //log to debug
    public function debug_to_console($data) {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln($data);
    }

    // Doanh thu
    public function revenue(Request $request){
        // $orders = Order::with(['user', 'video'])->get();
        
        // return view('admin.revenue', ['orders' => $orders]);
        // Lấy năm được chọn từ request hoặc mặc định là năm hiện tại

        
        $year = $request->input('year', date('Y'));

        // Tính tổng doanh thu dựa trên các giao dịch trong năm được chọn
        $totalRevenue = Order::whereYear('vnp_PayDate', $year)->sum('vnp_Amount');

        // Lấy danh sách các giao dịch trong năm được chọn
        $orders = Order::with(['user', 'video'])
                        ->whereYear('vnp_PayDate', $year)
                        ->get();

        // Truyền tổng doanh thu và danh sách giao dịch vào view
        return view('admin.revenue', [
            'orders' => $orders,
            'totalRevenue' => $totalRevenue,
            'year' => $year,
        ]);
    }
}


