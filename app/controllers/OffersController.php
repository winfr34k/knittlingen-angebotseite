<?php

class OffersController extends \BaseController {

	private function floatvalue($strValue) 
	{ 
	   $floatValue = preg_replace("/(^[0-9]*)(\\.|,)([0-9]*)(.*)/", "\\1.\\3", $strValue); 

	   if (!is_numeric($floatValue)) $floatValue = preg_replace("/(^[0-9]*)(.*)/", "\\1", $strValue); 
	   if (!is_numeric($floatValue)) $floatValue = 0; 

	   return $floatValue; 
  	} 


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('frontend.home', array('title' => "Home", 'offers' => Offer::all()));
	}

	public function search($keywords = '') 
	{
		return View::make('frontend.search', array('title' => 'Angebote durchsuchen'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name', 'description', 'amount', 'category_id');
		$validator = Validator::make($input, array('name' => 'required', 'description' => 'required', 'category_id' => 'required', 'amount' => 'required'));

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$offer = new Offer();
			$offer->name = $input['name'];
			$offer->description = $input['description'];
			$offer->amount = $this->floatvalue($input['amount']);
			$offer->company_id = Auth::user()->company->id;
			$offer->category_id = $input['category_id'];
			if($offer->save())
			{
				return Redirect::back()->with(array('success' => 'Das Angebot wurde erfolgreich erstellt!'));	
			}

			return Redirect::back()->withInput()->withErrors(array('unknownError' => 'Unbekannter Fehler'));		
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
		return View::make('frontend.offer', array('title' => "Home", 'offer' => Offer::find($id)));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$offer = Offer::find($id);

		$input = array(
			'id' => $offer->id,
			'name' => $offer->name,
			'amount' => $offer->amount,
			'startDate' => $offer->startDate,
			'endDate' => $offer->endDate,
			'category_id' => $offer->category_id,
			'description' => $offer->description
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
		$offer = Offer::find($id);

		$input = Input::only('name', 'description', 'amount', 'category_id');	
		$validator = Validator::make($input, array('name' => 'required', 'description' => 'required', 'category_id' => 'required', 'amount' => 'required'));

		if($validator->fails())
		{
			$input['id'] = $offer->id;
			return Redirect::back()->withInput($input)->withErrors($validator);
		}
		else
		{
			$offer->name = $input['name'];
			$offer->description = $input['description'];
			$offer->amount = $this->floatvalue($input['amount']);
			$offer->category_id = $input['category_id'];
			if($offer->save())
			{
				return Redirect::back()->with(array('success' => 'Das Angebot wurde erfolgreich bearbeitet!'));	
			}

			$input['id'] = $offer->id;
			return Redirect::back()->withInput($input)->withErrors(array('unknownError' => 'Unbekannter Fehler'));		
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
		$offer = Offer::find($id);
		$offer->delete();

		return Redirect::back()->with(array('success' => 'Das Angebot wurde erfolgreich gelöscht.'));
	}

}
