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
			return Redirect::back()->with(array('success' => 'Willkommen, '.Auth::user()->name.'!'));
		}
		else
		{
			if($validator->fails())
			{
				return Redirect::back()->withInput()->withErrors($validator);
			}
			else
			{
				return Redirect::back()->withInput()->withErrors(array('invalidCredentials' => 'Die Logindaten existieren nicht!'));
			}
		}

		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		if(!Session::get('success'))
			return Redirect::to('/login')->with('success', 'Sie haben sich erfolgreich ausgeloggt!');
		
		return Redirect::to('/login')->with('success', Session::get('success'));
	}


}
