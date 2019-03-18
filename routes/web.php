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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'offers'], function() {
    Route::get('load_store', 'OffersController@load_store')->name('offers_store');
    Route::get('show', 'OffersController@show')->name('offers_show');
});

Route::resource('offers', 'OffersController');

