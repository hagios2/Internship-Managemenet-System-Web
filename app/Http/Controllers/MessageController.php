<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'auth:main_cordinator']);
    }

    public function store(Request $reques)
    {

    }


    public function getMessages()
    {
        
    }

    
}
