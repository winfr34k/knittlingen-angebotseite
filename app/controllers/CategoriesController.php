<?php

class CategoriesController extends \BaseController {

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
		$input = Input::only('name');
		$validator = Validator::make($input, array('name' => 'required|unique:categories'));

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$category = new Category();
			$category->name = $input['name'];
			if($category->save())
			{
				return Redirect::back()->with(array('success' => 'Die Kategorie wurde erfolgreich angelegt.'));
			}
			else
			{
				return Redirect::back()->withErrors(array('unknownError', 'Es ist ein unbekannter Fehler aufgetreten.'));
			}
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
		$category = Category::find($id);

		$input = array(
			'id' => $category->id,
			'name' => $category->name,
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
		$category = Category::find($id);

		$input = Input::only('name');	
		$validator = Validator::make($input, array('name' => 'required|unique:categories'));

		if($validator->fails())
		{
			$input['id'] = $category->id;
			return Redirect::back()->withInput($input)->withErrors($validator);
		}
		else
		{
			$category->name = $input['name'];
			if($category->save())
			{
				return Redirect::back()->with(array('success' => 'Die Kategorie wurde erfolgreich bearbeitet!'));	
			}

			$input['id'] = $category->id;
			return Redirect::back()->withInput($input)->withErrors(array('unknownError' => 'Es ist ein unbkeannter Fehler aufgetreten.'));	
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
		$category = Category::find($id);

		if(count($category->offers) == 0)
		{
			$category->delete();
		}
		else
		{
			return Redirect::back()->withErrors(array('hasMoreThanZeroObjects' => 'Es sind noch Angebote dieser Kategorie zugeordnet.'));
		}


		return Redirect::back()->with(array('success' => 'Die Kategorie wurde erfolgreich gelöscht.'));
	}


}
