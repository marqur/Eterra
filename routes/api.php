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
])->name('products');;

Route::get('/product/{id}', [
	'uses' => 'ProductController@getProduct'
]);

Route::get('/posts', [
	'uses' => 'PostController@getPosts'
]);

Route::get('/posts/{id}', [
	'uses' => 'PostController@getPost'
]);

Route::get('/herbs', [
	'uses' => 'HerbController@getHerbs'
]);

Route::post('/comment', [
	'uses' => 'CommentController@addComment'
]);


/* END CONTENT ROUTES */


/* USER AUTH ROUTES */

Route::get('/user/{id}', [
	'uses' => 'UserController@getUsers'
]);

Route::get('/user', [
	'uses' => 'UserController@getUserInfo'
]);

Route::post('/user', [
	'uses' => 'UserController@signup'
]);

Route::post('/user/signin', [
	'uses' => 'UserController@signin'
]);

Route::put('/user/{id}', [
	'uses' => 'UserController@putUserInfo'
]);


/* END USER AUTH ROUTES */


/* ORDERS ROUTES */

Route::get('/order/{user_id}', [
	'uses' => 'OrderController@getOrders'
]);

Route::post('/add-order', [
	'uses' => 'OrderController@addOrder'
]);

Route::delete('/order/{user_id}', [
	'uses' => 'OrderController@deleteOrder'
]);


/* END ORDERS ROUTES */

/* ADVICES ROUTES */

Route::post('/advice', [
	'uses' => 'AdviceController@addAdvice'
]);

/* END ADVICES ROUTES */
