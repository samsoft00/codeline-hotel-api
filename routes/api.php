<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;

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
//Authentication route
Route::group([
    'namespace'     =>  'Api',
    'middleware'    =>  'api',
    'prefix'        =>  'auth'
], function(){
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group([
        'middleware'    =>  'auth:api'
    ], function(){
        Route::get('logout', 'AuthController@logout');
        Route::get('user', function(Request $request){
            return $request->user();
        });
    });
});

//Hotel route
Route::group([
    'namespace'     =>  'Api',
    'middleware'    =>  'api',
    'prefix'        =>  'hotels'
], function(){
    Route::get('', 'HotelsController@index');
    Route::get('{id}', 'HotelsController@show');
});


//Room route
Route::group([
    'namespace'     =>  'Api',
    'middleware'    =>  'api',
    'prefix'        =>  'rooms'
], function(){
    Route::get('/', 'RoomController@index');
    Route::get('/search', 'RoomController@search');
    Route::get('/images/{filename}', 'RoomController@display');
    Route::get('{id}', 'RoomController@show');

    Route::group([
        'middleware'    =>  'auth:api'
    ], function(){
        Route::post('', 'RoomController@store');
        Route::put('{id}', 'RoomController@update');
        Route::delete('{id}', 'RoomController@destroy');
    });
});

/**
 * Return Rooms type payload
 */
Route::group([
    'namespace'     =>  'Api',
    'middleware'    =>  'api',
    'prefix'        =>  'room-type'
], function(){
    Route::get('', 'RoomTypeController@index');
});


/**
 * Return Rooms Capacity payload
 */
Route::group([
    'namespace'     =>  'Api',
    'middleware'    =>  'api',
    'prefix'        =>  'room-capacity'
], function(){
    Route::get('', 'RoomCapacityController@index');
});

/**
 * Booking Endpoint
 */
Route::group([
    'namespace'     =>  'Api',
    'middleware'    =>  'api'
], function(){
    Route::apiResources([
        'book-room' => 'BookRoomController'
    ]);
});