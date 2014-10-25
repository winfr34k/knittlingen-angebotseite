<?php

class SettingsController extends \BaseController {

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
		$setting = Setting::find($id);

		$input = array(
			'id' => $setting->id,
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

		$input = Input::only('name', 'value');	
		$validator = Validator::make($input, array('name' => 'required', 'value' => 'required'));

		if($validator->fails())
		{
			$input['id'] = $setting->id;
			return Redirect::back()->withInput($input)->withErrors($validator);
		}
		else
		{
			$setting->name = $input['name'];
			$setting->value = $input['value'];
			if($setting->save())
			{
				return Redirect::back()->with(array('success' => 'Die Einstellung wurde erfolgreich geändert!'));	
			}

			$input['id'] = $setting->id;
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
