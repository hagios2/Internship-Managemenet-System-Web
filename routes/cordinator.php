<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('cordinator')->user();

    //dd($users);

    return view('cordinator.home');
})->name('home');

