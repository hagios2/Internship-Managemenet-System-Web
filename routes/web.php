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

//Auth::routes(['verify' => true]);

use Illuminate\Support\Facades\Route;

Route::post('auth/login', 'AuthController@login');

Route::post('auth/logout', 'AuthController@logout');

Route::post('auth/refresh-token', 'AuthController@refresh');

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

Route::get('scheduled-appointment', 'Student\StudentController@getScheduledAppointment');

Route::get('/view-approved/{application}', 'Student\StudentController@viewApprovedApp')->name('approved.application');

Route::get('/get-student/company-coordinates', 'Student\StudentController@getCompanyCoordinates');

Route::get('/user-preference', 'HomeController@showPreference');

Route::patch('/user-preference', 'HomeController@updatePreference');

Route::get('/change-password', 'HomeController@changePasswordForm');

Route::patch('/change-password', 'HomeController@changePassword');

Route::post('/intern/request-supervisor/approval', 'Student\StudentController@requestSupervisorApproval');

Route::get('/check/interns/attendance', 'Student\StudentController@checkAttendance');

Route::post('/intern/check-out/', 'Student\StudentController@checkOut');

Route::post('/intern/check-in/', 'Student\StudentController@checkIn');

Route::get('get-student/notifications', 'Student\StudentNotificationController@getNotifications');

Route::post('/send-message', 'MessageController@store');

Route::get('/get-messages', 'MessageController@getMessages');

Route::get('/', function () {
    return redirect()->route('home');

//    return view('welcome');
});

Route::get('/message', function () {
    return view('student.chats');
});

//Route::post('/map', function(Request $request){
//
//  $lat = $request->input('lat');
//  $long = $request->input('long');
//  $location = ["lat"=>$lat, "long"=>$long];
//  event(new SendLocation($location));
//  return response()->json(['status'=>'success', 'data'=>$location]);
//
//
//});

//end student route



Route::group(['prefix' => 'cordinator'], function () {
});

Route::get('/department/{department}/programs', 'Cordinator\CordinatorsController@getDepartmentProgram');

Route::get('/students-for/{program}/program', 'Cordinator\CordinatorsController@getProgramsStudent');


/*
use multi file uploads for cordinator
check file by index no to attach file in mail to send to the student with that index no
check for status of open letter request to filter the issuing of the letters
 */

Route::fallback(function () {
    return view('stu.404');
});
