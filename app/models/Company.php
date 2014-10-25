<?php

class Company extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	protected $fillable = array('name', 'website');

	/*
	 * Making a reverse-relationship work with the users table
	 */
	function user()
	{
		return $this->belongsTo('User');
	}

	/*
	 * Adding a one-to-many relationship so we can get all the offers
	 */
	function offers()
	{
		return $this->hasMany('Offer');
	}
}
