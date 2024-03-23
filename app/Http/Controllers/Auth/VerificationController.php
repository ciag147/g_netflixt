<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Mail;
use Str;
use App\Models\Password_reset;
use App\User;
use App\Models\User_token;
use App\Mail\RegisterMail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userToken;

     public function __construct(User_token $userToken)
    {
        $this->userToken = $userToken;
    }

    public function sendActivationMail($user)
    {
        if ($user->isActive == 1 || !$this->shouldSend($user)) return;
        $token = $this->userToken->createActivation($user);
        $user->activation_link = route('user.activate', $token);
        $mailable = new RegisterMail($user);
        Mail::to($user->email)->send($mailable);
    }
    public function activateUser($token)
    {
        $activation = $this->userToken->getActivationByToken($token);
        if ($activation === null) return null;
        $user = User::where('id',  $activation->userId) -> first();
        $user->isActive = '1';
        $user->email_verified_at = Carbon::now('Asia/Ho_Chi_Minh');
        $user->save();
        $this->userToken->deleteActivation($token);
        return $user;
    }

    private function shouldSend($user)
    {
        $activation = $this->userToken->getActivation($user);
        return $activation === null || Carbon::now('Asia/Ho_Chi_Minh') < $activation->expiredAt;
    }

    public function showSuccess(){
        return view('web.verify-success');

    }
}
