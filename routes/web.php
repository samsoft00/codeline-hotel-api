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
    Route::get('', function(){ return 'we are here'; });
    Route::get('login', function(){ return 'we are here to login'; });
});

/**
 * Frontend Route
 */
Route::get('/{any}', 'CodeLineHotelController@index')->where('any', '.*');