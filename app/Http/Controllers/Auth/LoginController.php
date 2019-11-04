<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:client')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function clientLoginForm() {
        return $this->loginForm('client');
    }

    public function adminLoginForm() {
        return $this->loginForm('admin');
    }

    public function loginForm($profileType) {
        return view('auth.login', ['url' => $profileType]);
    }

    public function clientLogin(Request $request)
    {
        return $this->login($request, 'client');
    }

    public function adminLogin(Request $request)
    {
        return $this->login($request, 'admin');
    }

    public function login(Request $request, $profileType)
    {
        $this->validate($request, [
            'login'   => 'required',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard($profileType)->attempt(['login' => $request->login, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('/');
        }

        return back()->withInput($request->only('login'))->withErrors([
            'message' => 'The login or password is incorrect, please try again'
        ]);
    }

    public function username() {
        return 'login';
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }

    // protected function guard()
    // {
    //     return Auth::guard($guard);
    // }
}
