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

Route::group(['middleware' => ['web'], 'namespace' => '\Acelle\Plugin\Lazada\Controllers'], function () {
    // Lazada setting
    Route::match(['post'], '/lazada/setting/save', 'MainController@save');
    Route::match(['get'], '/lazada/setting', 'MainController@index');
});
