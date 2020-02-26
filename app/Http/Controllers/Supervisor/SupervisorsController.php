<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupervisorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:supervisor');
    }


    public function accessStudent()
    {

    }


    public function viewInterns()
    {
        return view('supervisor.view_student');
    }


    public function viewInternsAttendance()
    {

    }

    public function showAccessmentForm()
    {

        return view('supervisor.accessmentform');
    }


}


