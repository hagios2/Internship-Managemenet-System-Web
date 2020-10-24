<?php

//Route::get('/dashboard', function () {
//    $users[] = Auth::user();
//    $users[] = Auth::guard()->user();
//    $users[] = Auth::guard('main_cordinator')->user();
//
//    //dd($users);
//
//    return view('main_cordinator.home');
//})->name('home');



//Route::get('/company', 'MainCordinator\CompanyController@index');

Route::resource('company', 'MainCordinator\CompanyController');

Route::get('/', function(){

    return redirect('/main-cordinator/dashboard');
});

Route::get('/login', 'MainCordinatorAuth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'MainCordinatorAuth\LoginController@login');
Route::post('/logout', 'MainCordinatorAuth\LoginController@logout')->name('main_cordinator_logout');

Route::get('/register', 'MainCordinatorAuth\RegisterController@showRegistrationForm')->name('main_cordinator_register');
Route::post('/register', 'MainCordinatorAuth\RegisterController@register');

Route::post('/password/email', 'MainCordinatorAuth\ForgotPasswordController@sendResetLinkEmail')->name('main_cordinator_password.request');
Route::post('/password/reset', 'MainCordinatorAuth\ResetPasswordController@reset')->name('main_cordinator_password.email');
Route::get('/password/reset', 'MainCordinatorAuth\ForgotPasswordController@showLinkRequestForm')->name('main_cordinator_password.reset');
Route::get('/password/reset/{token}', 'MainCordinatorAuth\ResetPasswordController@showResetForm');

Route::get('change-password',  'MainCordinatorAuth\ChangePasswordController@changePasswordForm');

Route::post('change-password',  'MainCordinatorAuth\ChangePasswordController@changePassword');

Route::get('/profile',  'MainCordinatorAuth\ChangePasswordController@viewProfile');

Route::patch('/profile',  'MainCordinatorAuth\ChangePasswordController@updateProfile');

Route::patch('/toggle', 'ToggleAppController@toggle');

Route::get('/student-applications', 'MainCordinator\InternshipProcessingController@index');

Route::get('/default-applications', 'MainCordinator\InternshipProcessingController@default_application');

Route::get('/proposed-applications', 'MainCordinator\InternshipProcessingController@proposed_application');

Route::get('/requests-for-open-letter', 'MainCordinator\InternshipProcessingController@request_open_letter');

Route::get('/other-applications', 'MainCordinator\InternshipProcessingController@other_application');

Route::delete('/{application}/deny', 'MainCordinator\InternshipProcessingController@deny_application');

Route::post('/application/{company}/approve', 'MainCordinator\InternshipProcessingController@approve_application');

Route::get('/letter/{application}/preview', 'MainCordinator\InternshipProcessingController@previewFile');

Route::delete('/letter/{application}/delete', 'MainCordinator\InternshipProcessingController@removeFile');

Route::post('/introductory-letter/{application}/send', 'MainCordinator\InternshipProcessingController@sendIntroductoryLetter');

Route::post('/approve/{application}/proposed-application', 'MainCordinator\InternshipProcessingController@approveProposedApplication');

Route::post('/approve-all/proposed-application', 'MainCordinator\InternshipProcessingController@approveAll');

Route::post('/revert/{application}/approval', 'MainCordinator\InternshipProcessingController@revertProposedApplication');

Route::get('/getStudent', 'MainCordinator\InternshipProcessingController@getStudent');

Route::get('/view-unapproved', 'MainCordinator\InternshipProcessingController@viewUnapproved');

Route::post('copy/{company}/with-letter', 'MainCordinator\InternshipProcessingController@copycompany');

Route::get('/messages', 'MainCordinator\MessageController@index');

Route::post('/send-message', 'MainCordinator\MessageController@store');

Route::get('/get-student/{user}/messages', 'MainCordinator\MessageController@getMessages');

Route::get('/get-unique/messages', 'MainCordinator\MessageController@getUniqueChat');

// Route::get('/department/create', 'DepartmentController@create');

Route::post('/department', 'DepartmentController@store');

Route::get('/department', 'DepartmentController@index');

/*   Route::post('/department', 'DepartmentController@store'); */
