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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Should be from one of registered clients
Route::prefix('/')->middleware('client')->group(function() {
    //Should be from one of registered clients & has scope of check the status
    Route::any('dashboard', 'TestController@dashboard')->middleware('client:place-orders');
    Route::any('login', 'TestController@index')->middleware('client:check-status');

    //Should be from one of registered clients & Auth
    Route::middleware('auth:api')->group(function() {
        //Should be from one of registered clients & Auth & has scope of the service
        Route::any('/profile', 'HomeController@show')->middleware('scope:check-status');
    });
});