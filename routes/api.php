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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//User
Route::post('/user/regist', 'UserController@create');
Route::post('/user/login', 'UserController@login');
Route::middleware('auth:api')->get('/user/info', 'UserController@show');
Route::middleware('auth:api')->get('/user/logout', 'UserController@logout');

//Ubike
Route::post('/ubike/set', 'UbikeController@setStationData');
Route::middleware('auth:api')->get('/ubike/stations/{search}', 'UbikeController@getStationsBySearch');
Route::middleware('auth:api')->get('/ubike/stations', 'UbikeController@getAllStations');
