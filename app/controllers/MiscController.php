<?php

class MiscController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function acp()
	{
		return View::make('backend.admin', array('title' => 'ACP'));
	}

	public function imprint()
	{
		return View::make('frontend.imprint', array('title' => 'Impressum'));
	}

    public function contact()
    {
        return View::make('frontend.contact', array('title' => 'Kontakt'));
    }

    public function postContact()
    {
        $this->beforeFilter('csrf');

        $email = 'info@gvv-knittlingen.de';

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
                $message->to($email)->subject('Knittlingen 2020 | Userfrage');
            });

            return Redirect::home()->with(array('success' => 'Ihre Nachricht wurde erfolgreich verschickt!'));
        }
    }
}
