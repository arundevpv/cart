<?php

namespace App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
	
	/* * The database table used by the model.
	   * @var string
	  */
	protected $table = 'category';	
	/* * Disable guarded property
	  */	
	protected $guarded = array();
	/* * Enable soft delete
	  */
    protected $softDelete = true;
	/**
		 * Setting up the relationship with Adds
	 */
	public function adds()
	{
		return $this->hasMany('App\Models\Adds\Adds','category_id');
	}
	
}?>