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

Route::get('/', 'OffersController@index');
Route::get('offers/search', 'OffersController@search');
Route::resource('offers', 'OffersController');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('session', 'SessionsController');

Route::resource('offers', 'OffersController');

Route::get('/imprint', function() 
{
	return View::make('frontend.imprint', array('title' => 'Impressum'));
});