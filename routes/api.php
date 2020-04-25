<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function () {
    
    return auth()->guard('api')->user();
});


Route::get('/programs', 'Api\RequestController@getPrograms');

Route::get('/levels', 'Api\RequestController@getLevels');

Route::post('/register', 'Api\RequestController@register');

Route::post('user/token', 'Api\RequestController@saveToken');

Route::get('/companies', 'Api\StudentController@sendCompany');

Route::post('/student-application', 'Api\StudentController@StudentApplication');