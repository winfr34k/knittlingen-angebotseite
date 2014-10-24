<?php

class Category extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'categories';

  function offers()
  {
    return $this->hasMany('Offer');
  }
}
