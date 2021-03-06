<?php

class UsersController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name', 'email', 'website', 'password', 'is_admin');
		$validator = Validator::make($input, array('name' => 'required|unique:companies', 'email' => 'required|unique:users', 'website' => 'required', 'password' => 'required'));

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$user = new User();
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			if(Input::get('is_admin') == '1')
			{
				$user->is_admin = true;
			}
			else
			{
				$user->is_admin = false;
			}

			if($user->save())
			{
				$company = new Company();
				$company->name = Input::get('name');
				if(filter_var(Input::get('website'), FILTER_VALIDATE_URL) === false)
				{
					$company->website = 'http://'.Input::get('website');
				}
				else
				{
					$company->website = Input::get('website');
				}
				$company->user_id = $user->id;
			}
			else
			{
				return Redirect::back()->withErrors(array('unknownError' => 'Es ist ein unbekannter Fehler beim Erstellen des Nutzers aufgetreten.'));
			}

			if($company->save())
			{
				Mail::send('emails.welcome', array('username' => Input::get('email'), 'password' => Input::get('password')), function($message)
				{
					$message->to(Input::get('email'))->subject('Willkommen bei Knittlingen-2020!');
				});

				return Redirect::back()->with(array('success' => 'Der Benutzer wurde erfolgreich angelegt!'));
			}

			return Redirect::back()->withInput()->withErrors(array('unknownError' => 'Es ist ein unbekannter Fehler aufgetreten.'));
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		$input = array(
			'id' => $user->id,
			'type' => 'user',
			'name' => $user->company->name,
			'email' => $user->email,
			'website' => $user->company->website,
			'is_admin' => $user->is_admin
		);

		return Redirect::back()->withInput($input);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		$input = Input::only('name', 'email', 'website', 'password', 'is_admin');
		$validator = Validator::make($input, array('name' => 'required', 'email' => 'required', 'website' => 'required'));

		if($validator->fails())
		{
			$input['id'] = $user->id;
			$input['type'] = 'user';
			return Redirect::back()->withInput($input)->withErrors($validator);
		}
		else
		{
			$is_admin = (Input::get('is_admin') == '1') ? '1' : '0';

			if($user->id == Auth::id() && $is_admin != '1')
			{
				return Redirect::back()->withInput()->withErrors(array('bigStupidity' => 'Sie können sich nicht selbst die Administratorrechte wegnehmen!'));
			}

			$user->email = Input::get('email');
			if( ! empty($input['password']))
			{
				$user->password = Hash::make($input['password']);
			}

			$user->is_admin = $is_admin;

			$company = Company::find($user->company->id);
			$company->name = Input::get('name');

			if(filter_var(Input::get('website'), FILTER_VALIDATE_URL) === false)
			{
				$company->website = 'http://'.Input::get('website');
			}
			else
			{
				$company->website = Input::get('website');
			}

			if($user->save() && $company->save())
			{
				return Redirect::back()->with(array('success' => 'Der Benutzer wurde erfolgreich bearbeitet!'));
			}

			$input['id'] = $user->id;
			$input['type'] = 'user';
			return Redirect::back()->withInput($input)->withErrors(array('unknownError' => 'Es ist ein unbekannter Fehler aufgetreten.'));
		}
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
     * Update the link for the companys' homepage
     *
     * @param $id
     * @return Response
     */
    public function updateLink($id)
    {
        $input = Input::only('newWebsite');
        $validator = Validator::make($input, array('newWebsite' => 'required'));

        if($validator->fails())
        {
            //User wants to change link for the company
            return Redirect::back()->withInput($input)->withErrors($validator);
        }
        else
        {
            $company = User::find(Auth::user()->id)->company;

            if($company->website == $input['newWebsite'])
            {
                return Redirect::back()->withErrors(array('sameLinkError' => 'Der Link ist bereits auf dem aktuellen Stand.'));
            }
            else
            {
                if(filter_var(Input::get('newWebsite'), FILTER_VALIDATE_URL) === false)
                {
                    $company->website = 'http://'.Input::get('newWebsite');
                }
                else
                {
                    $company->website = $input['newWebsite'];
                }

                if($company->save())
                {
                    return Redirect::back()->with(array('success' => 'Der Link wurde erfolgreich geändert.'));
                }

                return Redirect::back()->withErrors(array('unknownError' => 'Es ist ein unbekannter Fehler aufgetreten.'));
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
		$user = User::find($id);

		if(count($user->offers) > 0)
		{
			foreach($user->offers as $offer)
			{
				$offer->delete();
			}
		}

		$user->delete();

		return Redirect::back()->with(array('success' => 'Der Benutzer wurde erfolgreich gelöscht.'));
	}


}
