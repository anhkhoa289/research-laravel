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

Route::group([ 'prefix' => 'test' ], function () {
    Route::get('/', 'TestController@index');
    Route::get('/list', 'TestController@testList');
    Route::get('/extract', 'TestController@testExtract');
});

Route::group([ 'prefix' => 'ioc' ], function () {
    Route::get('/', 'IocController@index');
    Route::get('repo', 'IocController@usingRepository');
});
