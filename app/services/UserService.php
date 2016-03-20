<?php
class UserService{
	
	protected $userProvider;
	
	public function __construct($userProvider)
	{
		$this->userProvider = $userProvider;
		
	}
	/**
	`	* param id (int)
		* Created By Arun @ Itmarkerz (30/1/15)
	*/
	public function getUser($id)
	{
		return $this->userProvider->getById($id);	
	}
	
	/*
		* @return users (collection)
		* Created By Arun @ Itmarkerz (30/1/15)
	*/
	public function getAllUser($status)
	{
		return $this->userProvider->getAll($status);
	
	}
	/*
		* parm user (sentry object),addsData (array)
		* Created By Arun @ Itmarkerz (30/1/15)
	*/
	public function addAdds($user,$addsData,$addImages=array())
	{
		$user=$this->getUser($user->id);
		$add=$user->addAdds($addsData);
		for($i=0;$i<count($addImages);$i++)
		{
			if(!empty($addImages[$i]))
				$add->addImage(array('image_name'=>$addImages[$i]));	
		}
	}
	/*
		* parm userData (array)
		* Created By Arun @ Itmarkerz (31/1/15)
	*/
	public function register($userData=array())
	{
		return Sentry::register($userData,true);
	}
	/**
     * Logs an admin user in.
     *
     * @param string
     * @param string
     * @param boolean
     * @return Sentry Object
	 * Created By Arun @ Itmarkerz (31/1/15)
     */
    public function authenticate($email, $password, $remember = false)
    {
        $credentials = array(
            'email' => $email,
            'password' => $password,
        );

        $user = Sentry::authenticate($credentials,$remember);
		return $user;
    }
	 /**
     * Logs out the user.
	 * Created By Arun @ Itmarkerz (31/1/15)
     */
    public function logout()
    {
        Sentry::logout();
    }
	
}?>