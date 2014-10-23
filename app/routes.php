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

	/*//Creating an offer
	$offer = new Offer();
	$offer->name = 'Sonderangebot #2';
	$offer->description = 'yadda yadda yadda...';
	$offer->company_id = 1;
	$offer->save();*/

	//Showing the power of our relationship model: Finding all of one companies' offers, selecting the first and traverse down to the user
	return Company::find(1)->offers->first()->company->user;

	/*
	 * Other Examples:
	 * User::find(1)->offers;          - Select all the offers directly through the user
	 * User::find(1)->company->offers; - Traverse from the user up to all the offers there are
	 * Offer::find(1)->company; 	   - Find the company that posted the offer
	 */
});
