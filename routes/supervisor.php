<?php

//Route::get('/dashboard', function () {
//    $users[] = Auth::user();
//    $users[] = Auth::guard()->user();
//    $users[] = Auth::guard('supervisor')->user();
//
//    //dd($users);
//
//    return view('supervisor.home');
//})->name('home');


Route::get('/', function(){

    return redirect('/supervisor/dashboard');
});

Route::get('/profile', 'Supervisor\SupervisorsController@showProfileForm');

Route::post('/{supervisor}/profile-update', 'Supervisor\SupervisorsController@updateProfile');

Route::get('/login', 'SupervisorAuth\LoginController@showLoginForm')->name('supervisor_login');
Route::post('/login', 'SupervisorAuth\LoginController@login');
Route::post('/logout', 'SupervisorAuth\LoginController@logout')->name('supervisor_logout');

Route::get('/register', 'SupervisorAuth\RegisterController@showRegistrationForm')->name('supervisor_register');
Route::post('/register', 'SupervisorAuth\RegisterController@register');

Route::post('/password/email', 'SupervisorAuth\ForgotPasswordController@sendResetLinkEmail')->name('supervisor_password.request');
Route::post('/password/reset', 'SupervisorAuth\ResetPasswordController@reset')->name('supervisor_password.email');
Route::get('/password/reset', 'SupervisorAuth\ForgotPasswordController@showLinkRequestForm')->name('supervisor_password.reset');
Route::get('/password/reset/{token}', 'SupervisorAuth\ResetPasswordController@showResetForm');

Route::get('/view-interns', 'Supervisor\SupervisorsController@viewInterns');

Route::post('/check-code', 'Supervisor\SupervisorsController@checkCode');

Route::get('/assess/{student}/interns', 'Supervisor\SupervisorsController@show');

Route::get('/download/assessment-forms', 'Supervisor\SupervisorsController@downloadAssessmentForms');

Route::post('/upload/{student}/assessment-forms', 'Supervisor\SupervisorsController@uploadAssessmentForms');

Route::post('/assess/{student}/interns', 'Supervisor\SupervisorsController@assessStudent');

Route::patch('/edit/{student}/assessment', 'Supervisor\SupervisorsController@editAssessment');

Route::get('/get-interns/approval-requests', 'Supervisor\SupervisorsController@getApprovalRequests');

Route::post('/approve/{intern}/check-in', 'Supervisor\SupervisorsController@ApproveStudentCheckIn');

/*   Route::post('/deny/{intern}/check-in', 'Supervisor\SupervisorsController@ApproveStudentCheckIn'); */

Route::get('/get/{intern}/check-in/coords', 'Supervisor\SupervisorsController@getStudentRequestCoords');

Route::get('/view/{intern}/check-in/coords', 'Supervisor\SupervisorsController@viewStudentRequest');
