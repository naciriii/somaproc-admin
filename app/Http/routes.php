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



Route::auth();

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| ADMINS ROUTES
|--------------------------------------------------------------------------
*/
	Route::resource('admins','AdminsController');

	/*
|--------------------------------------------------------------------------
| CLIENTS ROUTES
|--------------------------------------------------------------------------
*/
	Route::resource('clients','ClientsController');

/*
|--------------------------------------------------------------------------
| PRODUCTS ROUTES
|--------------------------------------------------------------------------
*/
	Route::resource('products','ProductsController');

	/*
|--------------------------------------------------------------------------
| TOPICS ROUTES
|--------------------------------------------------------------------------
*/
	Route::resource('topics','TopicsController');

/*
|--------------------------------------------------------------------------
| CONTACTS ROUTES
|--------------------------------------------------------------------------
*/
	Route::resource('contacts', 'ContactsController');