<?php

class Company extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	/*
	 * Making a reverse-relationship work with the users table
	 */
	function user()
	{
		return $this->belongsTo('User');
	}
}
