<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('main_cordinator')->user();

    //dd($users);

    return view('main_cordinator.home');
})->name('home');



//Route::get('/company', 'MainCordinator\CompanyController@index');

Route::resource('company', 'MainCordinator\CompanyController');
