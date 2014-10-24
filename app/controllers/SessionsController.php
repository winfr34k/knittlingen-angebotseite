<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if( ! Auth::guest())
		{
			return Redirect::to('/');
		}

		return View::make('frontend.login', array('title' => 'Login'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::only('email', 'password'), array('email' => 'required', 'password' => 'required'));

		if(Auth::attempt(Input::only('email', 'password')))
		{
			return Redirect::back();
		}

		return Redirect::back()->withInput()->withErrors($validator->messages());
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/login')->with('success', 'Sie haben sich erfolgreich ausgeloggt!');
	}


}
