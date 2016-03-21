<?php
use App\Models\Adds\Adds;
class AddsProvider{
	
	/* * reference the modal
	 */	
	private function createModel()
	{
		return new Adds();		
	}
	/* * return product
	   * Param id(int)
	*/
	public function getById($id)
	{
		$adds = $this->createModel();
		return $adds::find($id);
	}
	
	
	
	/* * param $status (boolean)
	   * @ return adds (array)
	*/
	public function getAll($status=NULL)
	{
		$adds = $this->createModel();
		if($status==NULL)
		{			
			return $adds::paginate(20);		
		}
		else
		{
			return $adds::where('is_active','=',$status)->paginate(20);	
		}
	}
	/*
	*/
	public function search($searchParams,$status=NULL)
	{ 
		$adds = $this->createModel();
		//admin
		if($status==NULL){
			
			$category=$searchParams['category'];
			$location=$searchParams['location'];
			$key=$searchParams['searchKey']; 
			//only category
			if(!empty($category) && empty($location) && empty($key)){
				 return $adds::whereIn('category_id',$category)
				 			 ->orderBy('id','dec')
							 ->paginate(20); 	
			}
			//only key
			else if(empty($category) && empty($location) && !empty($key)){
				
				return $adds::where('title','LIKE','%'.$key.'%')
							->orderBy('id','dec')
							->groupBy('id')
							 ->paginate(20);	
			}
			//only location and category
			else if(!empty($category) && !empty($location) && empty($key)){
				return $adds::where('city_name','like','%'.$location.'%')
							 ->whereIn('category_id',$category)
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
			//category and key
			else if(!empty($category) && empty($location) && !empty($key)){
				return $adds::whereIn('category_id',$category)
							 ->where('title','LIKE','%'.$key.'%')
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
			// location ,category,key
			else
			{
				return $adds::where('city_name','like','%'.$location.'%')
							 ->whereIn('category_id',$category)
							 ->where('title','LIKE','%'.$key.'%')
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
		
		}
		//user
		else
		{
			$category=$searchParams['category']; 
			$location=$searchParams['location'];
			$key=$searchParams['searchKey']; 
			//only category
			if(!empty($category) && empty($location) && empty($key)){ 
				 return $adds::whereIn('category_id',$category)
				 			 ->where('is_active','=',1)
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
			//only key
			else if(empty($category) && empty($location) && !empty($key)){  
				//by brand
				$brands = DB::table('manufacturer')
							-> where('name','LIKE','%'.$key.'%')
							->select('id')
							->get();	
				$brand_ids = array();
				foreach($brands as $brand){
					$brand_ids []=$brand->id;
				}
				//by category
				$cats = DB::table('category')
							-> where('name','LIKE','%'.$key.'%')
							->select('id')
							->get();	
				$cat_ids = array();
				foreach($cats as $cat){
					$cat_ids []=$cat->id;
				}
				return $adds::where('title','LIKE','%'.$key.'%')
				 			 ->where('is_active','=',1)
							 ->orWhereIn('manufacturer_id',$brand_ids)
							 ->orWhereIn('category_id',$cat_ids)
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
			//only location and category
			else if(!empty($category) && !empty($location) && empty($key)){ 
				return $adds::where('city_name','like','%'.$location.'%')
							 ->whereIn('category_id',$category)
				 			 ->where('is_active','=',1)
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
			//category and key
			else if(!empty($category) && empty($location) && !empty($key)){
				return $adds::whereIn('category_id',$category)
							 ->where('title','LIKE','%'.$key.'%')
				 			 ->where('is_active','=',1)
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
			// location ,category,key
			else
			{
				return $adds::where('city_name','like','%'.$location.'%')
							 ->whereIn('category_id',$category)
							 ->where('title','LIKE','%'.$key.'%')
				 			 ->where('is_active','=',1)
							 ->orderBy('id','dec')
							 ->paginate(20);	
			}
		}
	}
	/*
	*/
	function getLatest($end,$start)
	{
		$adds = $this->createModel();
		return $adds::where('is_active',1)->orderBy('id','dec')->paginate(20);
	}
	/*
	*/
	function getAddsByUser($user_id)
	{
		$adds = $this->createModel();
		return $adds::where('is_active',1)->where('user_id','=',$user_id)->orderBy('id','dec')->paginate(20);
	}
}
?>