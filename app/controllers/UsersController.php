<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Used for bigger update
	}

	public function updatePassword($id)
	{
		$input = Input::only('oldPassword', 'newPassword', 'newPasswordRpt');
		$validator = Validator::make($input, array('oldPassword' => 'required', 'newPassword' => 'required', 'newPasswordRpt' => 'required'));

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			if($input['newPassword'] != $input['newPasswordRpt'])
			{
				return Redirect::back()->withErrors(array('passwordsDontMatch' => 'Die neuen Passwörter stimmen nicht überein.'));
			}
			else
			{
				$user = User::find($id);
				if(Hash::check($input['oldPassword'], $user->password))
				{
					$user->password = Hash::make($input['newPassword']);
					$user->save();

					return Redirect::to('/logout')->with(array('success' => 'Das Passwort wurde erfolgreich geändert.'));
				}
			
				return Redirect::back()->withErrors(array('wrongPassword' => 'Das eingegebene Passwort stimmt nicht mit dem aus der Datenbank überein.'));
			}
		}
	}

	public function updateEmail($id)
	{
		$input = Input::only('newEmail', 'newEmailRpt');
		$validator = Validator::make($input, array('newEmail' => 'required|unique:users,email', 'newEmailRpt' => 'required'));

		if($validator->fails())
		{
			//User wants to change eMail address
			return Redirect::back()->withInput($input)->withErrors($validator);
		}
		else
		{
			$user = User::find($id);
			if($user->email == $input['newEmail'])
			{
				return Redirect::back()->withErrors(array('sameEmailError' => 'Die E-Mail Adresse ist bereits auf dem aktuellen Stand.'));
			}
			else
			{
				if($input['newEmail'] == $input['newEmailRpt'])
				{
					$user->email = $input['newEmail'];
					$user->save();

					return Redirect::back()->with(array('success' => 'Ihre E-Mail Adresse wurde erfolgreich geändert.'));
				}
				else
				{
					return Redirect::back()->withInput()->withErrors(array('newEmailsNotTheSameError', 'Die E-Mail Adressen stimmen nicht überein.'));
				}
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
