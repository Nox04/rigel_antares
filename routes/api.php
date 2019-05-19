<?php

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

Route::prefix('mauth')->group(function () {
    // Login User
    Route::post('login', 'MessengersAuthController@login');

    // Refresh the JWT Token
    Route::get('refresh', 'MessengersAuthController@refresh');

    // Below mention routes are available only for the authenticated users.
    Route::middleware('auth:mobile')->group(function () {
        // Get user info
        Route::get('user', 'MessengersAuthController@user');
        // Logout user from application
        Route::post('logout', 'MessengersAuthController@logout');
    });
});

Route::middleware('auth:api')->group(function () {
    //Messengers
    Route::resource('messengers', 'MessengerController');
    Route::get('messengers/list/working', 'MessengerController@workingMessengers');
    Route::post('messengers/status', 'MessengerController@status');
    Route::post('messengers/geo', 'MessengerController@updateGeo');

    //Rides
    Route::resource('rides', 'RideController');
    Route::get('rides/list/pending', 'RideController@pendingRides');
    Route::post('rides/reactivate', 'RideController@reactivateRide');
});


Route::middleware('auth:mobile')->group(function () {
    //Messengers
    Route::post('messengers/geo', 'MessengerController@updateGeo');
    Route::post('messengers/start', 'MessengerController@startJourny');
    Route::post('messengers/stop', 'MessengerController@stopJourny');
    Route::post('messengers/rides', 'MessengerController@getMyRides');
    Route::get('messengers/rides/{$ride}', 'RideController@show');

    //Rides
    Route::post('rides/link', 'RideController@linkRide');
});
