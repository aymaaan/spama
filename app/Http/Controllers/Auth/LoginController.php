<?php

namespace App\Http\Controllers\Auth;
use App\Rules\Captcha;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */




    use AuthenticatesUsers;
    public $maxAttempts = 5; // change to the max attemp you want.
    public $decayMinutes = 2; // change to the minutes you want.

    
    public function authenticated(Request $request, $user)
    {
        if ($user->role !=  'admin') {
            
            auth()->logout();
            $admin_user = User::where('role','admin')->where('email' , $user->email )->first();
            Auth::login($admin_user);
            
            
            
            if (!$admin_user) {
                
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            
            }
            
            
            
            
        }
        return redirect()->intended($this->redirectPath());
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



protected function validateLogin(\Illuminate\Http\Request $request)
{
    $this->validate($request, [
        'email' => 'required|email|min:6',
        'password' => 'required|min:6',
        'g-recaptcha-response' => new Captcha(),
    ]);
}





}
