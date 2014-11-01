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
}
