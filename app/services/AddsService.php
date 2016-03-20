<?php
class AddsService {
	
	protected $addsProvider;
	
	
	public function __construct($addsProvider)
	{
		$this->addsProvider = $addsProvider;
		
		
	}
	/*
		*Created By Arun @ Itmarkerz (30/1/15)
	*/
	public function getById($id)
	{
		 return $this->addsProvider->getById($id);
		
	}
	/* * param status (boolean)
	 	* @ return products(array)
	 	*Created By Arun @ Itmarkerz (30/1/15)
	 */
    public function getAllProduct($status = NULL)
	{
		return $this->addsProvider->getAll($status);
	}
	/* * param user_id (int)
	 	* @ return products(array)
	 	*Created By Arun @ Itmarkerz (04/6/15)
	 */
	public function getAddsByUser($user_id)
	{
		return $this->addsProvider->getAddsByUser($user_id);
	}
	/*
		*Created By Arun @ Itmarkerz (30/1/15)
	*/
	public function search($searchParams=array(),$status=NULL)
	{
		return $this->addsProvider->search($searchParams,$status);
	}
	/*
		* param boolean,int
		* @ return boolean
		*Created By Arun @ Itmarkerz (30/1/15)
	*/
	public function changeStatus($status,$id){
		
		$answer = $this->addsProvider->getById($id);
		$answer->is_active = $status;
		$answer->changeStatus();
	}
	/*Created By Arun @ Itmarkerz (30/1/15)*/
	function latest($end=20,$start=0)
	{
		return $this->addsProvider->getLatest($end,$start);
	}
	/*Created By Arun @ Itmarkerz (04/6/15)*/
	public function remove($id)
	{
		$add=$this->getById($id);
		return $add->delete();
	}
	/*Created By Arun @ Itmarkerz (04/6/15)*/
	function updateAdds($id,$addsData,$addImages)
	{
		$add=$this->getById($id);
		$add->title=$addsData['title'];
		$add->description=$addsData['description'];
		$add->rental_amount=$addsData['rental_amount'];
		$add->rental_period=$addsData['rental_period'];
		$add->category_id=$addsData['category_id'];
		$add->email=$addsData['email'];
		$add->contact_no=$addsData['contact_no'];
		$add->name=$addsData['name'];
		$add->city_name=$addsData['city_name'];
		$add->latitude=$addsData['latitude'];
		$add->longitude=$addsData['longitude'];
		$add->user_type=$addsData['user_type'];
		$add->security_deposit=$addsData['security_deposit'];
		$add->available_for=$addsData['available_for'];
		$add->save();
		
		for($i=0;$i<count($addImages);$i++)
		{
			if(!empty($addImages[$i]))
				$add->addImage(array('image_name'=>$addImages[$i]));	
		}
	}
}
?>