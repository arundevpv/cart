<?php
namespace App\Models\Users;
use Illuminate\Database\Eloquent\Model;
class Users extends Model{
	/*
		* Disable guarded property
	*/	
	protected $guarded = array();
	/**
		* The database table used by the model.
		* @var string
	*/
	protected $table = 'users';	
	
	 /**
		 * Setting up the relationship with Adds
	 */
	public function adds()
	{
		return $this->hasMany('App\Models\Adds\Adds','user_id');
	}
	/**
     *
     * @param array
     * @return adds
     */
    public function addAdds($addData)
    {
       return $this->adds()->create($addData);
    }
}
?>