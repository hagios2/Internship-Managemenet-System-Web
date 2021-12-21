<?php


use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => 'auth'], function(){

    Route::post('auth/login', 'AuthController@login');

    Route::post('auth/logout', 'AuthController@logout');

    Route::post('auth/refresh-token', 'AuthController@refresh');
//});



Route::get('/login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout')->name('main_cordinator_logout');

//  Route::get('/register', 'MainCordinatorAuth\RegisterController@showRegistrationForm')->name('main_cordinator_register');
//  Route::post('/register', 'MainCordinatorAuth\RegisterController@register');

Route::post('/password/email', 'MainCordinatorAuth\ForgotPasswordController@sendResetLinkEmail')->name('main_cordinator_password.request');
Route::post('/password/reset', 'MainCordinatorAuth\ResetPasswordController@reset')->name('main_cordinator_password.email');
Route::get('/password/reset', 'MainCordinatorAuth\ForgotPasswordController@showLinkRequestForm')->name('main_cordinator_password.reset');
Route::get('/password/reset/{token}', 'MainCordinatorAuth\ResetPasswordController@showResetForm');

Route::get('change-password', 'MainCordinatorAuth\ChangePasswordController@changePasswordForm');

Route::post('change-password', 'MainCordinatorAuth\ChangePasswordController@changePassword');

Route::get('/profile', 'MainCordinatorAuth\ChangePasswordController@viewProfile');

Route::patch('/profile', 'MainCordinatorAuth\ChangePasswordController@updateProfile');

Route::patch('/toggle', 'ToggleAppController@toggle');

Route::get('/student-applications', 'MainCoordinator\InternshipProcessingController@index');

Route::get('/default-applications', 'MainCoordinator\InternshipProcessingController@default_application');

Route::get('/proposed-applications', 'MainCoordinator\InternshipProcessingController@proposed_application');

Route::get('/requests-for-open-letter', 'MainCoordinator\InternshipProcessingController@request_open_letter');

Route::get('/other-applications', 'MainCoordinator\InternshipProcessingController@other_application');

Route::delete('/{application}/deny', 'MainCoordinator\InternshipProcessingController@deny_application');

Route::post('/application/{company}/approve', 'MainCoordinator\InternshipProcessingController@approve_application');

Route::get('/letter/{application}/preview', 'MainCoordinator\InternshipProcessingController@previewFile');

Route::delete('/letter/{application}/delete', 'MainCoordinator\InternshipProcessingController@removeFile');

Route::post('/introductory-letter/{application}/send', 'MainCoordinator\InternshipProcessingController@sendIntroductoryLetter');

Route::post('/approve/{application}/proposed-application', 'MainCoordinator\InternshipProcessingController@approveProposedApplication');

Route::post('/approve-all/proposed-application', 'MainCoordinator\InternshipProcessingController@approveAll');

Route::post('/revert/{application}/approval', 'MainCoordinator\InternshipProcessingController@revertProposedApplication');

Route::get('/getStudent', 'MainCoordinator\InternshipProcessingController@getStudent');

Route::get('/view-unapproved', 'MainCoordinator\InternshipProcessingController@viewUnapproved');

Route::post('copy/{company}/with-letter', 'MainCoordinator\InternshipProcessingController@copycompany');

Route::get('/messages', 'MainCoordinator\MessageController@index');

Route::post('/send-message', 'MainCoordinator\MessageController@store');

Route::get('/get-student/{user}/messages', 'MainCoordinator\MessageController@getMessages');

Route::get('/get-unique/messages', 'MainCoordinator\MessageController@getUniqueChat');

// Route::get('/department/create', 'DepartmentController@create');

Route::post('/department', 'DepartmentController@store');

Route::get('/department', 'DepartmentController@index');

/*   Route::post('/department', 'DepartmentController@store'); */
