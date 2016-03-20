<?php

namespace App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Image extends Model{
	
	/* * The database table used by the model.
	   * @var string
	  */
	protected $table = 'product_images';
	/*
		* Disable timestamp property
	*/	
    public $timestamps = false;
	/* * Disable guarded property
	  */	
	protected $guarded = array();
	/**
		 * Setting up the inverse-relationship with adds
	 */
	 public function adds()
	 {
		return $this->belongsTo('App\Models\Adds\Adds');	
	 }	
	
}?>