<?php

namespace App\Http\Controllers;

use App\Models\MainCordinator;
use App\Models\ToggleApp;
use Illuminate\Http\Request;

class ToggleAppController extends Controller
{
     
    public function index()
    {
        $this->middleware('auth:main_cordinator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toggle(Request $request)
    {
        abort_if((auth()->guard('main_cordinator')->id() != MainCordinator::first()->id), 403);

        $toggleapp = ToggleApp::find(1);

        $request->has('toggle') ? $toggleapp->update(['toggle' => true]) : $toggleapp->update(['toggle' => false]);

        $switch = $toggleapp->toggle ? 'ON' : 'OFF';

        return back()->with('info', 'Toggled ' .$switch);
    }

}