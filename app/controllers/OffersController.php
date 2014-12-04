<?php

class OffersController extends \BaseController {

	/**
	 * Helper function to convert regional floating point declarations
	 * into the one used by our DB.
	 *
	 * @param $strValue
	 * @return float $floatValue
	 */
	private function floatValue($strValue)
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->beforeFilter('admin|csrf');

		$input = Input::only('name', 'description', 'amount', 'category_id', 'endDate');
		$validator = Validator::make($input, array('name' => 'required|unique:offers', 'description' => 'required', 'category_id' => 'required', 'amount' => 'required'));

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$offer = new Offer();
			$offer->name = $input['name'];
			$offer->description = $input['description'];
			$offer->amount = $this->floatValue($input['amount']);
       		$offer->endDate = $input['endDate'];
			$offer->company_id = Auth::user()->company->id;
			$offer->category_id = $input['category_id'];
			if($offer->save())
			{
				return Redirect::back()->with(array('success' => 'Das Angebot wurde erfolgreich erstellt!'));	
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
        Session::put('offerId', $id);
		$offer = Offer::find($id);
		return View::make('frontend.offer', array('title' => 'Angebot: '.$offer->name, 'offer' => $offer));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->beforeFilter('admin');

		$offer = Offer::find($id);

		$input = array(
			'id' => $offer->id,
			'type' => 'offer',
			'name' => $offer->name,
			'amount' => number_format($offer->amount, 2, ',', '.'),
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
		$this->beforeFilter('admin|csrf');

		$offer = Offer::find($id);

		$input = Input::only('id', 'name', 'description', 'amount', 'category_id', 'endDate');
		$validator = Validator::make($input, array('name' => 'required', 'description' => 'required', 'category_id' => 'required', 'amount' => 'required'));

		if($validator->fails())
		{
			$input['id'] = $offer->id;
			$input['type'] = 'offer';
			return Redirect::back()->withInput($input)->withErrors($validator);
		}
		else
		{
			$offer->name = $input['name'];
			$offer->description = $input['description'];
			$offer->amount = $this->floatValue($input['amount']);
    		$offer->endDate = $input['endDate'];
			$offer->category_id = $input['category_id'];
			if($offer->save())
			{
				return Redirect::back()->with(array('success' => 'Das Angebot wurde erfolgreich bearbeitet!'));	
			}

			$input['id'] = $offer->id;
			$input['type'] = 'offer';
			return Redirect::back()->withInput($input)->withErrors(array('unknownError' => 'Es ist ein unbekannter Fehler aufgetreten.'));
		}
	}

    /**
     * Send an eMail to the firm corresponding to the offer
     *
     * @param $id
     * @return Response
     */
    public function postMessage($id)
    {
        $this->beforeFilter('csrf');

        $offer = Offer::find($id);
        $email = $offer->company->user->email;

        $input = Input::only('name', 'email', 'subject', 'message');
        $validator = Validator::make($input, array('name' => 'required', 'email' => 'required|email', 'subject' => 'required', 'message' => 'required'));

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $message = nl2br(Input::get('message'));
            /** @var String $email */
            Mail::send('emails.contact', array('from' => Input::get('name'), 'email' => Input::get('email'), 'subject' => Input::get('subject'), 'mailMessage' => $message), function($message) use ($email)
            {
                $message->to($email)->subject('Knittlingen 2020 | Post für Sie!');
            });

            return Redirect::home()->with(array('success' => 'Ihre Nachricht wurde erfolgreich verschickt!'));
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
		$this->beforeFilter('admin');

		$offer = Offer::find($id);
		$offer->delete();

		return Redirect::back()->with(array('success' => 'Das Angebot wurde erfolgreich gelöscht.'));
	}

}
