<?php

class Offer extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'offers';

	/*
	 * Making a reverse-relationship work with the companies table
	 */
	function company()
	{
		return $this->belongsTo('Company');
	}

	/*
	 * Adding a reverse-relationship to the categories
	 */
	function category()
	{
		return $this->belongsTo('Category');
	}
}
