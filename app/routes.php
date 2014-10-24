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
	$user->save();

	//Creating a company
	$company = new Company();
	$company->name = 'MRR PC-Service';
	$company->website = 'mrauser.net';
	$company->user_id = 1; //This defines the relation between user and company!
	$company->save();

	//Adding a category
	$category = new Category();
	$category->name = 'Tests';
	$category->save();

	//Creating an offer
	$offer = new Offer();
	$offer->name = 'Sonderangebot #2';
	$offer->description = 'yadda yadda yadda...';
	$offer->company_id = 1;
	$offer->category_id = 1;
	$offer->amount = 300.00;
	$offer->save();

	//Changing an offer so it actually has a Euro-amount
	$offer = Offer::find(1);
	$offer->amount = 300.00;
	$offer->save();*/

	/*
	 * Showing the power of our relationship model: Finding all of one companies' offers, selecting the first and traverse down to the user
	 * return Company::find(1)->offers->first()->company->user;
	 * 
	 * Other Examples:
	 * User::find(1)->offers;          - Select all the offers directly through the user
	 * User::find(1)->company->offers; - Traverse from the user up to all the offers there are
	 * Offer::find(1)->company; 	     - Find the company that posted the offer
	 * Category::find(1)->offers;			 - Show all the offers that are in one category
	 * Offer::find(1)->category        - Show the category that belongs ot an offer
	 */

	/*$offer = new Offer();
	$offer->name = 'Test';
	$offer->description = 'Dies ist ein Test.';
	$offer->company_id = 1;
	$offer->category_id = 1;
	$offer->amount = 20.00;
	$offer->save();*/


	return View::make('frontend.home', array('title' => "Home", 'offers' => Offer::all()));
});

Route::resource('offers', 'OffersController');

Route::get('/imprint', function() 
{
	return View::make('frontend.imprint', array('title' => 'Impressum'));
});