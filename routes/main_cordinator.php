<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('main_cordinator')->user();

    //dd($users);

    return view('main_cordinator.home');
})->name('home');

