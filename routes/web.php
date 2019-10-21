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

Route::get('/', function () {
    return view('welcome');
});

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
});


#Students Route
Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});
