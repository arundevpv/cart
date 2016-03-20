<?php


use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model{
	
	/* * The database table used by the model.
	   * @var string
	  */
	protected $table = 'banner_image';	
	/* * Disable guarded property
	  */	
	protected $guarded = array();
	/* * Enable soft delete
	  */
    protected $softDelete = true;
	/**
		 * Setting up the relationship with Adds
	 */
	public function banner()
	{
		return $this->hasMany('App\Models\Adds\Adds','banner_id');
	}
	
}?>