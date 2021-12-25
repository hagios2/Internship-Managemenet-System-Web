<?php


use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', 'Auth\AuthController@login');

    Route::post('logout', 'Auth\AuthController@logout');

    Route::post('refresh-token', 'Auth\AuthController@refresh');
});

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

#------------------------------------------------- DEPARTMENT ROUTES ----------------------------------------

Route::post('/department', 'DepartmentController@store');

Route::get('/department', 'DepartmentController@index');

Route::post('/department/{department}/update', 'DepartmentController@update');

Route::delete('/department/{department}/delete', 'DepartmentController@destroy');

#------------------------------------------------- END DEPARTMENT ROUTE --------------------------------------

#------------------------------------------------- COMPANY ROUTES ------------------------------------------

Route::post('/company', 'CompanyController@store');

Route::get('/companies', 'CompanyController@index');

Route::get('/get/{company}/company', 'CompanyController@fetchCompany');

Route::put('/company/{company}/update', 'CompanyController@update');

Route::delete('/company/{company}/delete', 'CompanyController@destroy');

#------------------------------------------------- END COMPANY ROUTE --------------------------------------

#------------------------------------------------- REGION ROUTES ------------------------------------------

Route::get('/cities', 'RegionsController@fetchRegions');

Route::get('/fetch-departments', 'DepartmentController@fetchDepartments');

Route::get('/fetch-companies', 'CompanyController@fetchCompanies');

#------------------------------------------------- END REGION ROUTE --------------------------------------

#------------------------------------------------- COORDINATOR ROUTES ------------------------------------------

Route::post('/staff', 'CoordinatorController@store');

Route::get('/staff', 'CoordinatorController@index');

Route::get('/get/{coordinator}/staff', 'CoordinatorController@fetchCompany');

Route::put('/staff/{coordinator}/update', 'CoordinatorController@update');

Route::delete('/staff/{coordinator}/delete', 'CoordinatorController@destroy');

#------------------------------------------------- END COORDINATOR ROUTE --------------------------------------
