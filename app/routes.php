<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Login & Session
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('session', 'SessionsController');

//Offers
Route::get('/', 'OffersController@index');
Route::get('offers/search', 'OffersController@search');
Route::resource('offers', 'OffersController');

//Imprint
Route::get('/imprint', 'MiscController@imprint');

//ACP (only used for display)
Route::get('admin', 'MiscController@acp');

//Companies (only used for database-exchange)
Route::resource('companies', 'CompaniesController');

//Users (only used for database-exchange)
Route::resource('users', 'UsersController');

//Categories (only used for database-exchange)
Route::resource('categories', 'CategoriesController');

//Settings (only used for database-exchange)
Route::resource('settings', 'SettingsController');