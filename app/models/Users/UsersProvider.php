<?php
use App\Models\Users\Users;
class UsersProvider{
	
	/* * reference the modal
	 */	
	private function createModel()
	{
		return new Users();		
	}
	/*	
		* param id (int)
		* @ return user 
	*/
	public function getById($id){
		
			$user = $this->createModel();
			return $user ::find($id);
			
	}
	/*	
		* param status (int)
		* @ return all users 
	*/
	public function getAll($status=NULL)
	{
		$user = $this->createModel();
		 if($status==NULL){			
			return $user::all();		
		}
		else{
			return $user::where('activated','=',$status)->get();	
		}
	}	
}
?>