<?php

namespace App\Http\Controllers\CordinatorAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hesto\MultiAuth\Traits\LogsoutGuard;

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
    public $redirectTo = '/cordinator/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cordinator.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('vendor.adminlte.cordinator_login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('cordinator');
    }


    public function login(Request $request)
    {

        if (Auth::guard('cordinator')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Authentication passed...

            auth()->guard('cordinator')->user()->update(['device_token' => $request->device_token]);

            return redirect()->intended('/cordinator/dashboard');
        }

        return back()->with('error', 'Invalid email and password!');
        
    }


    public function logoutToPath()
    {
        return '/cordinator/login';
    }
}
