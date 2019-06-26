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

/**
 * Backend Route
 */
Route::group([
    'namespace'     =>  'Admin',
    'prefix'        =>  'admin'    
], function(){

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('post-login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group([
        'middleware'    =>  'auth'
    ], function(){

        /**
         * Hotel Details
         * 1. ability to retrieve hotel details
         * 2. ability to edit hotel details
         */

        // Route::resource('hotel-manager', 'HotelManagerController');

        /**
         * Room Manager
         * crud actions for room manager
         */
        Route::resource('room-manager', 'RoomManagerController');

        /**
         * Room Type Manager
         * All required fields should be validated 
         */
        Route::resource('room-type-manager', 'RoomTypeManagerController');

        /**
         * Price List Manager
         * All required fields should be validated
         */
        Route::resource('price-list-manager', 'PriceListManagerController');

        /**
         * Booking Manager
         * All required fields should be validated
         */
        Route::resource('booking-manager', 'BookingManagerController');        

    });

});

/**
 * Frontend Route
 */
Route::get('/{any}', 'CodeLineHotelController@index')->where('any', '.*');