<?php

class ManufacturerController extends BaseController {
	/*
	*/
	function addForm($id=NULL)
	{
		$data['manufactures']=Manufacturer::all();
		if($id==NULL)
		{
			return View::make('manufacture.add_edit',$data);
		}
		else
		{
			$data['manufacture']=Manufacturer::find($id);
			return View::make('manufacture.add_edit',$data);
		}
	}
	/*
	*/
	function save()
	{
		$id=Input::get('id');
		if(!empty($id))
		{
			$photo=Input::get('old_file');
			if($_FILES['photo']['name'])
			{
				$file_name=Input::file('photo')->getClientOriginalName();
				$extension=Input::file('photo')->getClientOriginalExtension();
				$random=strtotime(date('Y-m-d h:s:i'));
				$image=$random.'.'.$extension;
				$cat_image=getimagesize(Input::file('photo'));
				$image_width=$cat_image[0];
				$image_height=$cat_image[1];
				if(($image_width!=50)&&($image_height !=50)){
				  Image::make(Input::file('photo')->getRealPath())->resize(130,100)->save('uploads/manufacture/'.$image);
				}
				else
				 Image::make(Input::file('photo')->getRealPath())->save('uploads/manufacture/'.$image);
				try{
					if(file_exists('uploads/manufacture/'.$photo)){
						unlink('uploads/manufacture/'.$photo);
					}
				}catch(Exception $e){}
				$photo=$image;
			}
			$manufactureData=array('name'=>Input::get('category'),'parent_id'=>Input::get('parent'),'photo'=>$photo);
			Manufacturer::update($id,$manufactureData);
			$message="manufacture Successfully updated";
		}
		else
		{
			$photo='';
			if($_FILES['photo']['name'])
			{
				$file_name=Input::file('photo')->getClientOriginalName();
				$extension=Input::file('photo')->getClientOriginalExtension();
				$random=strtotime(date('Y-m-d h:s:i'));
				$image=$random.'.'.$extension;
				$cat_image=getimagesize(Input::file('photo'));
				$image_width=$cat_image[0];
				$image_height=$cat_image[1];
				if(($image_width!=50)&&($image_height !=50)){
				  Image::make(Input::file('photo')->getRealPath())->resize(130,100)->save('uploads/manufacture/'.$image);
				}
				else
				 Image::make(Input::file('photo')->getRealPath())->save('uploads/manufacture/'.$image);
				$photo=$image;
			}
			$manufactureData=array('name'=>Input::get('category'),'photo'=>$photo);
			Manufacturer::create($manufactureData);
			$message="manufacture Successfully added";
		}
		return Redirect::to('admin/manufacture')->with('message',$message);
	}
	/*
	*/
	function remove($id=NULL)
	{
		Manufacturer::remove($id);
		$message="manufacture Successfully removed";
		return Redirect::to('admin/manufacture')->with('message',$message);
	}
	

}?>