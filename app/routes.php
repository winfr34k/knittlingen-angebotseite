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

//Login & Logout (Sessions)
Route::get('login', array('before' => 'guest', 'as' => 'session.create', 'uses' => 'SessionsController@create'));
Route::post('sessions', array('before' => 'guest', 'as' => 'session.store', 'uses' => 'SessionsController@store'));
Route::get('logout', array('before' => 'auth', 'uses' => 'SessionsController@destroy'));
Route::delete('sessions/{id}', array('before' => 'auth', 'as' => 'session.destroy', 'uses' => 'SessionsController@destroy'));

//Offers
Route::get('/', array('as' => 'home', 'uses' => 'OffersController@index'));
Route::post('offers/{id}/mail', array('as' => 'offers.postMessage', 'uses' => 'OffersController@postMessage'));
Route::resource('offers', 'OffersController');

//Imprint
Route::get('/latenight', array('as' => 'latenight', 'uses' => 'MiscController@latenight'));

//Contact form
Route::get('/contact', array('as' => 'contact', 'uses' => 'MiscController@contact'));
Route::post('/contact', array('as' => 'contact.postContact', 'uses' => 'MiscController@postContact'));

//Imprint
Route::get('/imprint', array('as' => 'imprint', 'uses' => 'MiscController@imprint'));

//ACP (only used for display)
Route::get('admin', array('before' => 'auth', 'uses' => 'MiscController@acp'));

//Users (only used for database-exchange)
Route::get('users/{id}/edit', array('before' => 'admin', 'as' => 'users.edit', 'uses' => 'UsersController@edit'));
Route::post('users', array('before' => 'admin|csrf', 'as' => 'users.store', 'uses' => 'UsersController@store'));
Route::put('users/{id}', array('before' => 'admin|csrf', 'as' => 'users.update', 'uses' => 'UsersController@update'));
Route::put('users/updatePassword/{id}', array('before' => 'csrf', 'as' => 'users.updatePassword', 'uses' => 'UsersController@updatePassword'));
Route::put('users/updateEmail/{id}', array('before' => 'csrf', 'as' => 'users.updateEmail', 'uses' => 'UsersController@updateEmail'));
Route::put('users/updateLink/{id}', array('before' => 'csrf', 'as' => 'users.updateLink', 'uses' => 'UsersController@updateLink'));
Route::delete('users/{id}', array('before' => 'admin', 'as' => 'users.destroy', 'uses' => 'UsersController@destroy'));

//Categories (only used for database-exchange)
Route::get('categories/{id}/edit', array('before' => 'admin', 'as' => 'categories.edit', 'uses' => 'CategoriesController@edit'));
Route::post('categories', array('before' => 'admin|csrf', 'as' => 'categories.store', 'uses' => 'CategoriesController@store'));
Route::put('categories/{id}', array('before' => 'admin|csrf', 'as' => 'categories.update', 'uses' => 'CategoriesController@update'));
Route::delete('categories/{id}', array('before' => 'admin', 'as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy'));

//Settings (only used for database-exchange)
Route::get('settings/{id}/edit', array('before' => 'admin', 'as' => 'settings.edit', 'uses' => 'SettingsController@edit'));
Route::post('settings', array('before' => 'admin|csrf', 'as' => 'settings.store', 'uses' => 'SettingsController@store'));
Route::put('settings/{id}', array('before' => 'admin|csrf', 'as' => 'settings.update', 'uses' => 'SettingsController@update'));
Route::delete('settings/{id}', array('before' => 'admin', 'as' => 'settings.destroy', 'uses' => 'SettingsController@destroy'));