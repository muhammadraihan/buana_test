<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'Api\AuthController@Login');
    Route::post('customer', 'Api\CustomerController@store');
    Route::get('customer', 'Api\CustomerController@index');
});

// Auth route
Route::group(['prefix' => 'v1', 'middleware' => ['jwt']], function () {
    Route::get('logout', 'Api\AuthController@Logout');
});
