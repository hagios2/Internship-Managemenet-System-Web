<?php

namespace App\Http\Controllers\MainCordinatorAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
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

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/main-cordinator/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('main_cordinator.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('vendor.adminlte.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('main_cordinator');
    }

    public function login(Request $request)
    {
        if (Auth::guard('main_cordinator')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Authentication passed...

            auth()->guard('main_cordinator')->user()->update(['device_token' => $request->device_token]);

            return redirect()->intended('/main-cordinator/dashboard');
        }

        return back()->with('error', 'Invalid email and password!');
    }



    public function logoutToPath()
    {   
        return '/main-cordinator/login';
    }
}
