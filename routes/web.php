<?php
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/register',[AuthController::class,'showFormRegister'])->name('showFormRegister');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',[AuthController::class,'showFormLogin'])->name('showFormLogin');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/forgot-password',[ForgotPasswordController::class,'showForgotPassPage'])->name('showForgotPassPage');
Route::post('/forgot-password',[ForgotPasswordController::class,'checkExistedEmail'])->name('checkExistedEmail');
Route::get('/forgot-password/enter-otp',[ForgotPasswordController::class,'showEnterOTPPage'])->name('showEnterOTPPage');
Route::post('/forgot-password/sending-otp',[ForgotPasswordController::class,'sendOtp'])->name('sendOtp');
Route::post('/forgot-password/enter-otp',[ForgotPasswordController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/forgot-password/new-password',[ResetPasswordController::class,'showNewPassPage'])->name('showNewPassPage');
Route::post('/forgot-password/new-password',[ResetPasswordController::class,'setNewPass'])->name('setNewPass');
Route::get('user/activation/{token}', [AuthController::class,'activateUser'])->name('user.activate');
Route::get('/verify-success',[VerificationController::class,'showSuccess'])->name('verify-success');
Route::group(['prefix' => 'video'], function(){
    Route::get('details', 'HomeController@videoDetails')->name('video.details');
    Route::get('watch', 'HomeController@videoWatch')->middleware('paid')->name('video.watch');
    Route::post('comment', 'HomeController@videoComment')->name('video.comment');
    Route::get('category', 'HomeController@videoCategory')->name('video.category');
});

Route::group(['prefix' => 'api/video'], function(){
    Route::get('commentList', 'API\VideoAPI@commentList');
    Route::get('like', 'API\VideoAPI@like');
});

Route::group(['prefix' => 'payment'], function(){
    Route::get('vnp', 'PaymentController@getVnpPage');
    Route::get('vnp/return', 'PaymentController@vnpReturn');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/transaction',[UserController::class,'showTransaction'])->name('transaction');
    Route::get('/profile', 'UserController@showProfile')->name('showProfile');
    Route::get('/editprofile', 'UserController@showFrmProfile')->name('showFrmProfile');
    Route::get('/changepass', 'UserController@showFrmChangePass')->name('showFrmChangePass');
    Route::post('/changepass', 'UserController@changePass')->name('changePass');
    Route::post('/update-profile', 'UserController@editProfile')->name('updateProfile');
    Route::get('/favorites', 'UserController@showFavorites')->name('favorites');   
});

//Đăng nhập Facebook
// Route::get('auth/facebook', function(){
//     return Socialite::driver('facebook')->redirect();
// });
// Route::get('auth/facebook/callback', function(){
//     return 'Facebook Call Back';
// });


//Giac admin

Route::get('/admin', 'AdminController@index')->name('admin.login'); //index

Route::post('/admin', 'AdminController@login')->name('admin.login.post'); //login

Route::get('/test', 'AdminController@testDB'); //test


Route::get('/admin/dashboard', 'AdminController@showDashboard')->name('admin.dashboard')->middleware('auth'); //dashboard

Route::get('/admin/videos', 'AdminController@showVideoList'); //danh sách phim

Route::get('/admin/video/add', 'AdminController@addVideoForm')->name('admin.video.add'); //form thêm phim

Route::post('/admin/video/add', 'AdminController@addVideo')->name('admin.video.store'); //lưu phim

Route::get('/admin/video/edit/{id}', 'AdminController@editVideoForm')->name('admin.video.edit'); //form sửa phim

Route::post('/admin/video/edit/{id}', 'AdminController@update')->name('admin.video.update'); //update

Route::post('/admin/video/{id}/deactivate', 'AdminController@deactivateVideo')->name('admin.video.deactivate'); //ngừng công chiếu

Route::get('/admin/videos/disabled', 'AdminController@disabledList')->name('admin.video.disabled'); //phim disabled

Route::post('/admin/video/restore', 'AdminController@restore')->name('admin.video.restore'); //khôi phục phim

Route::get('/admin/users', 'AdminController@showUserList')->name('admin.users'); //danh sách user

Route::get('/admin/user/update/{id}', 'AdminController@updateUserForm')->name('admin.user.edit'); //form sửa user

Route::post('/admin/user/update/{id}', 'AdminController@updateUser')->name('admin.user.update'); //update user

Route::get('/admin/videos/liked', 'AdminController@likedVideoList'); //lượt thích các phim

Route::get('/admin/userlike', 'AdminController@userLiked')->name('userlike'); //người dùng thích

Route::get('/admin/videos/userlike', 'AdminController@userLiked')->name('userlike'); //người dùng thích

Route::get('/admin/doanhthu', 'AdminController@revenue')->name('revenue'); //doanh thu

Route::get('/admin/videos/doanhthu', 'AdminController@revenue')->name('revenue'); //doanh thu

Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');



