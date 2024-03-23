<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showNewPassPage(){
        return view('web.new-password');
    }

    public function setNewPass(Request $request){
        $email = Session::get('success-otp');
        $user = User::where('email',$email)->first();
        User::updateOrCreate(
            ['email' => $email],
            [
            'password' => bcrypt($request->password)
            ]
        );
        return redirect()->route('showFormLogin')->with('new-pass-success','new pass success');

    }
}
