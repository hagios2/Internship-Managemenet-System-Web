<?php

namespace App\Http\Controllers;

use App\ToggleApp;
use Illuminate\Http\Request;

class ToggleAppController extends Controller
{
     
    public function index()
    {
        $this->middleware('auth:main-cordinator');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToggleApp $toggleapp)
    {
        abort_if((auth()->id() !== MainCordinator::first()->id), 403);

        $request->toggle ? $toggleapp->update(['toggle', true]) : $toggleapp->update(['toggle', false]);

        $switch = $request->toggle ? 'on' : 'off';

        return back()->withSuccess('Toggled ' .$switch);
    }

}
