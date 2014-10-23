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

Route::get('/', function()
{
	/*//Creating a user
	$user = new User();
	$user->email = 'winfr34k@gmail.com';
	$user->password = Hash::make('test123');
	//$user->is_admin = true;
	$user->save();*/

	/*//Creating a company
	$company = new Company();
	$company->name = 'MRR PC-Service';
	$company->website = 'mrauser.net';
	$company->user_id = 1; //This defines the relation between user and company!
	$company->save();*/

	//Displaying the company of a user
	return Company::find(1)->user;
});
