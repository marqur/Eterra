<?php

use Illuminate\Http\Request;

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




/*  CONTENT ROUTES */

Route::get('/products', [
	'uses' => 'ProductController@getProducts'
]);

Route::get('/product/{id}', [
	'uses' => 'ProductController@getProduct'
]);

Route::get('/posts', [
	'uses' => 'PostController@getPosts'
]);

Route::get('/posts/{id}', [
	'uses' => 'PostController@getPost'
]);


/* END CONTENT ROUTES */


/* USER AUTH ROUTES */

Route::post('/user', [
	'uses' => 'UserController@signup'
]);

Route::post('/user/signin', [
	'uses' => 'UserController@signin'
]);


/* END USER AUTH ROUTES */