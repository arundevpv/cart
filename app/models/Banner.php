<?php
use Illuminate\Database\Eloquent\Model;

class Banner extends Model{
	
	/* * The database table used by the model.
	   * @var string
	  */
	protected $table = 'banner';	
	/* * Disable guarded property
	  */	
	protected $guarded = array();
	/* * Enable soft delete
	  */
    protected $softDelete = true;

	 /**
		 * Setting up the inverse-relationship with BannerImage
	 */
	 public function bannerImage()
	 {
		return $this->belongsTo('BannerImage');	
	 }
	 /*
     * @param array
     * 
     */
    public function addImage($imageData)
    {
       return $this->bannerImage()->create($imageData);
    }
}?>