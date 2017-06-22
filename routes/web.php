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
    return view('mail');
});

Route::get('/time', function () {
    return view('timer');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
