<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//student routoe

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified']], function () {
  
  Route::get('/internshipapply', 'Student\StudentController@create');

  Route::post('/internshipapply', 'Student\StudentController@store');

  Route::get('/internshipapply/{application}/edit', 'Student\StudentController@edit');

  Route::patch('/internshipapply/{application}', 'Student\StudentController@update');

  Route::delete('/internshipapply/{application}/delete', 'Student\StudentController@destroy');

});

Route::patch('/start-internship/{application}', 'Student\StudentController@startInternship');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/interns', 'Student\StudentController@interns');

Route::post('/appointment/{appointment}', 'Student\StudentController@approveAppointment');

Route::get('/view-approved/{application}', 'Student\StudentController@viewApprovedApp')->name('approved.application');


Route::get('/', function () {

    return view('welcome');
});

//end student route 

//Main cordinator
Route::group(['prefix' => 'main-cordinator'], function () {
  
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
  
});


Route::group(['prefix' => 'cordinator'], function () {

  Route::get('/', function(){

    return redirect('/cordinator/dashboard');
  });

  Route::get('/login', 'CordinatorAuth\LoginController@showLoginForm')->name('cordinator_login');
  Route::post('/login', 'CordinatorAuth\LoginController@login');
  Route::post('/logout', 'CordinatorAuth\LoginController@logout')->name('cordinator_logout');

  Route::get('/register', 'CordinatorAuth\RegisterController@showRegistrationForm')->name('cordinator_register');
  Route::post('/register', 'CordinatorAuth\RegisterController@register');

  Route::post('/password/email', 'CordinatorAuth\ForgotPasswordController@sendResetLinkEmail')->name('cordinator_password.request');
  Route::post('/password/reset', 'CordinatorAuth\ResetPasswordController@reset')->name('cordinator_password.email');
  Route::get('/password/reset', 'CordinatorAuth\ForgotPasswordController@showLinkRequestForm')->name('cordinator_password.reset');
  Route::get('/password/reset/{token}', 'CordinatorAuth\ResetPasswordController@showResetForm');

  Route::get('/student-application/{application}', 'Cordinator\CordinatorsController@studentApplication');

  Route::post('/schedule-appointment', 'Cordinator\CordinatorsController@scheduleAppointments');

  Route::post('/application/{application}/appointment', 'Cordinator\CordinatorsController@companyAppointment'); 

  Route::get('/other-application/students', 'Cordinator\CordinatorsController@otherApplications');

});

Route::get('/department/{department}/programs', 'Cordinator\CordinatorsController@getDepartmentProgram');

Route::get('/students-for/{program}/program', 'Cordinator\CordinatorsController@getProgramsStudent');



/* 
use multi file uploads for cordinator
check file by index no to attach file in mail to send to the student with that index no
check for status of open letter request to filter the issuing of the letters 
 */

Route::group(['prefix' => 'supervisor'], function () {
  Route::get('/', function(){

    return redirect('/supervisor/dashboard');
  });

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

});


