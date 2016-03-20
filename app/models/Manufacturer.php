<?php


use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model{
	
	/* * The database table used by the model.
	   * @var string
	  */
	protected $table = 'manufacturer';	
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
		return $this->hasMany('App\Models\Adds\Adds','manufacturer_id');
	}
	
}?>