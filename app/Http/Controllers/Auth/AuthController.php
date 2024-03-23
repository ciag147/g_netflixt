<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User_token;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\VerificationController;
use Session;
use Str;
use Mail;
class AuthController extends Controller{


    public function showFormRegister(){
        return view('web.register');
    }

    public function showFormLogin(){
        $urlPrevious = url()->previous();
        $urlBase = url()->to('/');
        
        // Set the previous url that we came from to redirect to after successful login but only if is internal
        if(($urlPrevious != $urlBase . '/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase) && ($urlPrevious != $urlBase . '/verify-success')) {
            session()->put('url.intended', $urlPrevious);
        }
        return view('web.login');
    }


    protected $verify;
    public function __construct(VerificationController $verify)
    {
        $this->verify = $verify;
    }

    public function register(Request $request){
       
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
        ]);
        
        if ($validator->fails()) {
            // Email đã tồn tại
            return redirect()->back()->with('existed_email','Email da ton tai');
        } else {
            // Email chưa tồn tại
            $user = new User();
            $user->fullname = $request->fullname;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->password = bcrypt($request->password);
            $user->save();
            $this->verify->sendActivationMail($user);
            return redirect()->back()->with('register_success','Dang ky thanh cong');
        }
    }

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(Auth::attempt(['email' => $request->email,'password' => $request->password, 'isActive' => 1])){
            return redirect()->intended('/')->with('success', 'success');
        }
        if(Auth::attempt(['email' => $request->email,'password' => $request->password, 'isActive' => 0])){
            Auth::logout();
            return redirect()->back()->with('no_active', 'no_active');
        }
        return redirect()->back()->with('error','error');
    }
    
    public function activateUser($token)
    {
        if ($user = $this->verify->activateUser($token)) {
            session(['activate-success' => $user->email]);
            return redirect()->route('verify-success');
        }
        abort(404);
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}