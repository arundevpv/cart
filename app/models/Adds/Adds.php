<?php

namespace App\Models\Adds;
use Illuminate\Database\Eloquent\Model;

class Adds extends Model{
	
	/* * The database table used by the model.
	   * @var string
	  */
	protected $table = 'adds';	
		
		
	/* * Disable guarded property
	  */	
	protected $guarded = array();
	/* * Enable Softdelete
	 */
	protected $softDelete = true;
	/**
		 * Setting up the inverse-relationship with user
	 */
	 public function users()
	 {
		return $this->belongsTo('App\Models\Users\Users');	
	 }
	 /**
		 * Setting up the inverse-relationship with category
	 */
	 public function category()
	 {
		return $this->belongsTo('App\Models\Category\Category');	
	 }
	 /**
		 * Setting up the relationship with image
	 */
	public function image()
	{
		return $this->hasMany('App\Models\Image\Image','add_id');
	}
	/**
     *
     * @param array
     * @return adds
     */
    public function addImage($imageData)
    {
       return $this->image()->create($imageData);
    }
	 /*	
		* @ return boolean
	*/
	public function changeStatus()
	{
		return parent::save() ? true : false;
	}
}?>