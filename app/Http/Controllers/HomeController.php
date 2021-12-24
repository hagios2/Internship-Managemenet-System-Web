<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('stu.index');

        /* return view('student.home'); */
    }


    public function showPreference()
    {
        return view('stu.profile');
    }


    public function updatePreference(Request $request)
    {
        $attribute = $request->validate([

            'fname' => 'required|string',

            'sname' => 'required|string',

            'email' => 'required|email',

            'phone' => 'required|numeric',

            'index_no' => 'required|string',

            'level_id' => 'required|integer',

            'program_id' => 'required|integer'

        ]);

        auth()->user()->update([

            'name' => $attribute['fname'] . ' ' . $attribute['sname'],

            'email' => $attribute['email'],

            'index_no' => $attribute['index_no'],

            'program_id' => $attribute['program_id'],

            'level_id' => $attribute['level_id'],

        ]);

        return back()->with('success', 'Profile updated');
    }



    public function changePassword(Request $request)
    {
        $passwords = $request->validate([

            'new_password' => 'required|confirmed',

            'password' => 'required'

        ]);

        if (Hash::check($passwords['password'], auth()->user()->password)) {
            auth()->user()->update([

                'password' => Hash::make($passwords['new_password'])
            ]);


            return back()->withSuccess('New Password Saved');
        }

        return back()->withError('Invalid Password');
    }


    public function changePasswordForm()
    {
        return view('student.change_password');
    }
}
