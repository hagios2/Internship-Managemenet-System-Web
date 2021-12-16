<?php

namespace App\Http\Controllers\MainCoordinator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function auth;
use function back;
use function view;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:main_cordinator');
    }




    public function changePassword(Request $request)
    {
        $passwords = $request->validate([

            'new_password' => 'required|confirmed',

            'password' => 'required'

        ]);

        if (Hash::check($passwords['password'], auth()->guard('main_cordinator')->user()->password)) {
            auth()->guard('main_cordinator')->user()->update([

                'password' => Hash::make($passwords['new_password'])
            ]);


            return back()->withSuccess('New Password Saved');
        }

        return back()->withError('Invalid Password');
    }


    public function changePasswordForm()
    {
        return view('main_cordinator.change_password');
    }


    public function viewProfile()
    {
        return view('main_cordinator.profile');
    }


    public function updateProfile(Request $request)
    {
        $profile = $request->validate([

            'firstname' => 'required|string',

            'lastname' => 'required|string',

            'othername' => 'nullable',

            'email' => 'required|email'
        ]);

        auth()->guard('main_cordinator')->user()->update([

            'name' => $profile['firstname']. ' '. $profile['othername']. ' '. $profile['lastname'],

            'email' => $profile['email']
        ]);



        return back()->withSuccess('All changes saved');
    }
}
