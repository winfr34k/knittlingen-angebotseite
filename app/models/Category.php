<?php

class Category extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'categories';

  protected $fillable = array('name');

  function offers()
  {
    return $this->hasMany('Offer');
  }
}
