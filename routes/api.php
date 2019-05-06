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

Route::prefix('auth')->group(function () {
    // Login User
    Route::post('login', 'AuthController@login');

    // Refresh the JWT Token
    Route::get('refresh', 'AuthController@refresh');

    // Below mention routes are available only for the authenticated users.
    Route::middleware('auth:api')->group(function () {
        // Get user info
        Route::get('user', 'AuthController@user');
        // Logout user from application
        Route::post('logout', 'AuthController@logout');
    });
});

Route::middleware('auth:api')->group(function () {
    //Messengers
    Route::resource('messengers', 'MessengerController', ['except' => ['create', 'edit']]);
    Route::get('messengers/list/working', 'MessengerController@workingMessengers');
    Route::post('messengers/status', 'MessengerController@status');

    //Rides
    Route::resource('rides', 'RideController', ['except' => ['create', 'edit']]);
    Route::get('rides/list/pending', 'RideController@pendingRides');
    Route::post('rides/reactivate', 'RideController@reactivateRide');
});
