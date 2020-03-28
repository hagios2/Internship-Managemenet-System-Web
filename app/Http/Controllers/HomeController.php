<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipApplication;

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
}
