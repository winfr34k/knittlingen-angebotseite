<?php

class SettingsController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name', 'value');
		$validator = Validator::make($input, array('name' => 'required|unique:settings', 'value' => 'required'));

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$setting = new Setting();
			$setting->name = $input['name'];
			$setting->value = $input['value'];
			if($setting->save())
			{
				return Redirect::back()->with(array('success' => 'Die Einstellung wurde erfolgreich erstellt!'));	
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
		$setting = Setting::find($id);

		$input = array(
			'id' => $setting->id,
			'type' => 'setting',
			'name' => $setting->name,
			'value' => $setting->value
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
		$setting = Setting::find($id);

		$input = Input::only('id', 'value');
		$validator = Validator::make($input, array('value' => 'required'));

		if($validator->fails())
		{
			$input['id'] = $setting->id;
			$input['type'] = 'setting';
			return Redirect::back()->withInput($input)->withErrors($validator);
		}
		else
		{
			$setting->value = $input['value'];
			if($setting->save())
			{
				return Redirect::back()->with(array('success' => 'Die Einstellung wurde erfolgreich geändert!'));	
			}

			$input['id'] = $setting->id;
			$input['type'] = 'setting';
			return Redirect::back()->withInput($input)->withErrors(array('unknownError' => 'Es ist ein unbekannter Fehler aufgetreten.'));
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
		$setting = Setting::find($id);
		$setting->delete();

		return Redirect::back()->with(array('success' => 'Die Einstellung wurde erfolgreich gelöscht.'));
	}

}
