<?php

//Route::get('/dashboard', function () {
//    $users[] = Auth::user();
//    $users[] = Auth::guard()->user();
//    $users[] = Auth::guard('cordinator')->user();
//
//    //dd($users);
//
//    return view('cordinator.home');
//})->name('home');


Route::get('/', function(){ return redirect('/cordinator/dashboard');});

Route::get('/login', 'CordinatorAuth\LoginController@showLoginForm')->name('cordinator_login');

Route::post('/login', 'CordinatorAuth\LoginController@login');

Route::post('/logout', 'CordinatorAuth\LoginController@logout')->name('cordinator_logout');

Route::get('/register', 'CordinatorAuth\RegisterController@showRegistrationForm')->name('cordinator_register');

Route::post('/register', 'CordinatorAuth\RegisterController@register');

Route::post('/password/email', 'CordinatorAuth\ForgotPasswordController@sendResetLinkEmail')->name('cordinator_password.request');

Route::post('/password/reset', 'CordinatorAuth\ResetPasswordController@reset')->name('cordinator_password.email');

Route::get('/password/reset', 'CordinatorAuth\ForgotPasswordController@showLinkRequestForm')->name('cordinator_password.reset');

Route::get('/password/reset/{token}', 'CordinatorAuth\ResetPasswordController@showResetForm');

Route::get('/view/{department}/applications', 'Cordinator\CordinatorsController@viewApplication');

Route::get('/program/applications', 'Cordinator\CordinatorsController@getProgram');

Route::get('/view/{student}/application', 'Cordinator\CordinatorsController@viewStudentApplication');

Route::get('/{student}/assessment/folder', 'Cordinator\CordinatorsController@getAssessmentFiles');

Route::post('/assess/{student}', 'Cordinator\CordinatorsController@assessStudent');

Route::get('/view/{student}/attendance', 'Cordinator\CordinatorsController@viewAttendance');

Route::get('/view/{student}/{file}', 'Cordinator\CordinatorsController@viewFile');

Route::get('/student-application/{application}', 'Cordinator\CordinatorsController@studentApplication');

Route::post('/schedule-appointment', 'Cordinator\CordinatorsController@scheduleAppointments');

Route::post('/application/{application}/appointment', 'Cordinator\CordinatorsController@companyAppointment');

Route::get('/other-application/students', 'Cordinator\CordinatorsController@otherApplications');

Route::get('/view-appointments', 'Cordinator\CordinatorsController@viewAppointments');

Route::get('/approved-appointment', 'Cordinator\CordinatorsController@getNotedAppointment');
