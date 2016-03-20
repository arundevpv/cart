<?php

class AddController extends BaseController {

	
	public function addsForm($id=NULL)
	{
		$data['periods']=Config::get('rental_periods');
		$data['categories']=Category::getSubCategories();	
		//$data['states']=City::getAllStates(1);			//active
		if($id==NULL)
			return View::make('adds.add',$data);
		else{
			$id=Crypt::decrypt($id);
			$data['add']=Adds::getById($id);
			return View::make('adds.update',$data);
		}
				
	}

	public function save()
	{
		$allowed = "image/png, image/jpeg, image/gif, image/bmp,image/vnd.microsoft.icon,image/tiff,image/svg+xml";
		//required filed validation
		$rules = array(
						'title' => 'required',
						'description' => 'required|min:30',
						'category'=> 'required',
						);
		$validator = Validator::make(Input::all(),$rules);			
		if ($validator->fails())
		{
			$messages = $validator->messages(); 
			return Redirect::to('adds')->withErrors($validator)->withInput();
		}
		else
		{
			
			//adds data
			$addsData=array(
							'title'=>Input::get('title'),
							'description'=>Input::get('description'),
							//remove this fields from next version
							'category_id'=>Input::get('category'),
							'price'=>Input::get('price'),
							'manufacturer_id'=>Input::get('manufacturer'),
							'quantity'=>Input::get('qty'),
							'model'=>Input::get('model'),
							'related_products'=>'',//Input::get('category'),
							'free_shipping'=>Input::get('frr_ship'),
			);
			$productImages=explode(',',Input::get('files'));
			$removedFiles=Input::get('removed_files');
			if(!empty($removedFiles))
			{
				$destination='uploads/adds/';
				$removedFiles=explode(',',$removedFiles);
				for($k=0;$k<count($removedFiles)-1;$k++)
				{
					try{
						if(file_exists($destination.$removedFiles[$k]))
							unlink($destination.$removedFiles[$k]);
					}catch(Exception $e){}
					$index=array_search($removedFiles[$k],$productImages);
					if($index>0)
						unset($productImages[$index]);
				}
				$productImages=array_values($productImages);
			}
			$user=User::getUser(1);
			User::addAdds($user,$addsData,$productImages);
			return Redirect::to('admin/adds')->with('message', 'Add successfully posted');
		}
	}
	/*
		* ajax request
	*/
	public function changeStatus($status,$id)
	{
		Adds::changeStatus($status,$id);
	}
	/*
		* ajax request
	*/
	function getCityByState()
	{
		$state=Input::get('state');
		echo City::getCityByState($state)->toJson();
	}
	/*
		* ajax request
	*/
	public function uploadImage()
	{
		$rules = array('file'=>'image');
		$validator = Validator::make(Input::all(),$rules);			
		if ($validator->fails())
		{
			echo 'File format not supported!..';
		}
		else
		{
			if($_FILES['file']['name']) {
				$destination='uploads/adds/';
				$file_name=Input::file('file')->getClientOriginalName();
				$extension=Input::file('file')->getClientOriginalExtension();
				$image=rand(200,5555).'-'.date('d-m-Y-h-s-i').'-'.$file_name;
				Input::file('file')->move($destination,$image);
				echo $image;
			
			}
		}
	}
	/*
		* ajax request
	*/
	public function removeImage()
	{
		$removed_images=explode(',',Input::get('removed_old_files'));
		$removed_id=explode(',',Input::get('old_files'));
		for($i=0;$i<count($removed_images);$i++){
			$destination='uploads/adds/';
			try{
				if(file_exists($destination.$removed_images[$i]))
				 unlink($destination.$removed_images[$i]);
			}catch(Exception $e){}
			DB::table('product_images')->where('id', '=', $removed_id[$i])->delete();
		}
	}
	/*
	*/
	public function remove($id)
	{
		$id=Crypt::decrypt($id);
		Adds::remove($id);
		return Redirect::to('users/dashboard')->with('message', 'Add successfully removed');
	}
	/*
	*/
	function updateAdd()
	{
		$removed_images=explode(',',Input::get('removed_old_files'));
		if(count($removed_images)>0)
			$this->removeImage();
		$id=Input::get('id');
		$allowed = "image/png, image/jpeg, image/gif, image/bmp,image/vnd.microsoft.icon,image/tiff,image/svg+xml";
		//required filed validation
		$rules = array(
						'title' => 'required',
						'description' => 'required|min:30',
						'rent_amount' => 'required|numeric',
						'phone_number'=>'required|numeric|min:6',
						'email' => 'email',
						'rent_period'=>'required',
						'category'=> 'required',
						'name'=>'required'
						);
		$validator = Validator::make(Input::all(),$rules);			
		if ($validator->fails())
		{
			$messages = $validator->messages(); 
			return Redirect::to('users/adds/update/'.Crypt::encrypt($id))->withErrors($validator)->withInput();
		}
		else
		{
			try{
				$user=Sentry::findUserByCredentials(array('email'=>Input::get('email')));
			}catch(Exception $e){
				$user=Sentry::getUser();
				$user->email=Input::get('email');
				$user->first_name=Input::get('name');
				$user->save();
				
			}
			//adds data
			$addsData=array(
							'title'=>Input::get('title'),
							'description'=>Input::get('description'),
							'rental_amount'=>Input::get('rent_amount'),
							'rental_period'=>Input::get('rent_period'),
							//remove this fields from next version
							'category_id'=>Input::get('category'),
							'email'=>Input::get('email'),
							'contact_no'=>Input::get('phone_number'),
							'name'=>Input::get('name'),
							'city_name'=>Input::get('city_name'),
							'latitude'=>Input::get('mapLat'),
							'longitude'=>Input::get('mapLong'),
							'user_type'=>Input::get('user_type'),
							'security_deposit'=>Input::get('security_deposit'),
							'available_for'=>Input::get('available_for')
			);
			$user=Sentry::findUserById($user->id);
			$productImages=explode(',',Input::get('files'));
			$removedFiles=Input::get('removed_files');
			if(!empty($removedFiles))
			{
				$destination='uploads/adds/';
				$removedFiles=explode(',',$removedFiles);
				for($k=0;$k<count($removedFiles)-1;$k++)
				{
					try{
						if(file_exists($destination.$removedFiles[$k]))
							unlink($destination.$removedFiles[$k]);
					}catch(Exception $e){}
					$index=array_search($removedFiles[$k],$productImages);
					if($index>0)
						unset($productImages[$index]);
				}
				$productImages=array_values($productImages);
			}
			Adds::updateAdds($id,$addsData,$productImages);
			return Redirect::to('users/dashboard')->with('message', 'Add successfully updated');
		}
	
	}

}
