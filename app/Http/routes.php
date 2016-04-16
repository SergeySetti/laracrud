<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('order', 'OrderController');
    
    Route::group(['middleware' => ['filters.ordersfilter']], function () {
        Route::post('order', [
            'middleware' => 'filters.ordersfilter', 
            'uses' => 'OrderController@filter',
        ]);
        Route::get('order', [
            'middleware' => 'filters.ordersfilter', 
            'uses' => 'OrderController@index',
        ]);
    });

    Route::group(['middleware' => ['filters.goodsfilter']], function () {
        Route::resource('good', 'GoodController');
        Route::post('/good/store', [
            'uses' => 'GoodController@store',
        ]);
    });
    
});
