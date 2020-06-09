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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Sample URL: localhost:8000/api/v1
 * 
 */

Route::prefix('v1')->group(function(){

    // Auth
    Route::post('login', 'Auth\AuthController@login');
    Route::post('register', 'Auth\AuthController@register');
    // End Auth

    Route::get('status', 'StatusController@index');
    Route::post('reservation', 'ReservationController@store');
    
    Route::middleware('auth:api')->group(function () {
        
        // Route::resource('status', 'StatusController');
        Route::get('reservation', 'ReservationController@index');
        Route::put('reservation/{reservation}', 'ReservationController@update');

    });

});
