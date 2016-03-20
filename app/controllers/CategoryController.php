<?php
class CategoryController extends BaseController {
	/*
	*/
	function addForm($id=NULL)
	{
		$data['categories']=Category::getAllCategory();
		if($id==NULL)
		{
			return View::make('category.add_edit',$data);
		}
		else
		{
			$data['category']=Category::getCategory($id);
			return View::make('category.add_edit',$data);
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
				  Image::make(Input::file('photo')->getRealPath())->resize(50,50)->save('uploads/category/'.$image);
				}
				else
				 Image::make(Input::file('photo')->getRealPath())->save('uploads/category/'.$image);
				try{
					if(file_exists('uploads/category/'.$photo)){
						unlink('uploads/category/'.$photo);
					}
				}catch(Exception $e){}
				$photo=$image;
			}
			$categoryData=array('name'=>Input::get('category'),'parent_id'=>Input::get('parent'),'photo'=>$photo);
			Category::update($id,$categoryData);
			$message="Category Successfully updated";
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
				  Image::make(Input::file('photo')->getRealPath())->resize(50,50)->save('uploads/category/'.$image);
				}
				else
				 Image::make(Input::file('photo')->getRealPath())->save('uploads/category/'.$image);
				$photo=$image;
			}
			$categoryData=array('name'=>Input::get('category'),'parent_id'=>Input::get('parent'),'photo'=>$photo);
			Category::add($categoryData);
			$message="Category Successfully added";
		}
		return Redirect::to('admin/category')->with('message',$message);
	}
	/*
	*/
	function remove($id=NULL)
	{
		Category::remove($id);
		$message="Category Successfully removed";
		return Redirect::to('admin/category')->with('message',$message);
	}
	

}?>