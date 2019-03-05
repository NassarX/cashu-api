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

//Should be from one of registered clients
Route::prefix('auth')->middleware('client')->group(function() {
    //Should be from one of registered clients & has scope of check the status
    Route::any('/register', 'AuthController@index')->middleware('client:place-orders');
    Route::any('/login', 'AuthController@index')->middleware('client:check-status');

    //Should be from one of registered clients & Auth
    Route::middleware('auth:api')->group(function() {
        //Should be from one of registered clients & Auth & has scope of the service
        Route::any('/profile', 'AuthController@show')->middleware('scope:check-status');
    });
});
