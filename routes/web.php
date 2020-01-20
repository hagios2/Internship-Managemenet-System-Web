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
  
  Route::get('internshipapply', 'Student\StudentController@create');

  Route::post('internshipapply', 'Student\StudentController@store');

  Route::get('internshipapply/{application}/edit', 'Student\StudentController@edit');

  Route::patch('internshipapply/{application}', 'Student\StudentController@update');

});

Route::get('/dashboard', 'HomeController@index')->name('home');


Route::get('/', function () {

    return view('welcome');
});

//end student route 

//Main cordinator
Route::group(['prefix' => 'main-cordinator'], function () {
  Route::get('/login', 'MainCordinatorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'MainCordinatorAuth\LoginController@login');
  Route::post('/logout', 'MainCordinatorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'MainCordinatorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'MainCordinatorAuth\RegisterController@register');

  Route::post('/password/email', 'MainCordinatorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'MainCordinatorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'MainCordinatorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'MainCordinatorAuth\ResetPasswordController@showResetForm');

  Route::patch('/toggle', 'ToggleAppController@toggle');
});


Route::group(['prefix' => 'cordinator'], function () {
  Route::get('/login', 'CordinatorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CordinatorAuth\LoginController@login');
  Route::post('/logout', 'CordinatorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CordinatorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CordinatorAuth\RegisterController@register');

  Route::post('/password/email', 'CordinatorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CordinatorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CordinatorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CordinatorAuth\ResetPasswordController@showResetForm');
});
