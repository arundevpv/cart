<?php
class BannerController extends BaseController {
	/*
	*/
	function addForm($id=NULL)
	{
		$data['banner']=Banner::find(1);
		if($id==NULL)
		{
			return View::make('banner.add_edit',$data);
		}
		else
		{
			$data['category']=Banner::find($id);
			return View::make('banner.add_edit',$data);
		}
	}
	/*
	*/
	function save()
	{
		$id=Input::get('id');
		if(!empty($id))
		{}
		else
		{
			
			$bannerData=array('title'=>Input::get('banner'),'link'=>Input::get('link'));
			$banner=Banner::create($bannerData);
			$productImages=explode(',',Input::get('files'));
			$removedFiles=Input::get('removed_files');
			if(!empty($removedFiles))
			{
				$destination='uploads/banners/';
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
			for($i=0;$i<count($productImages);$i++)
			{
				if(!empty($productImages[$i]))
					//$banner->addImage(array('image'=>$productImages[$i]));	
					BannerImage::create(array('banner_id'=>$banner->id,'image'=>$productImages[$i]));
			}
			
			$message="Banner Successfully added";
		}
		return Redirect::to('admin/banners')->with('message',$message);
	}
	/*
	*/
	function remove($id=NULL)
	{
		Category::remove($id);
		$message="Category Successfully removed";
		return Redirect::to('admin/category')->with('message',$message);
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
				$destination='uploads/banners/';
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
			$destination='uploads/banners/';
			try{
				if(file_exists($destination.$removed_images[$i]))
				 unlink($destination.$removed_images[$i]);
			}catch(Exception $e){}
			DB::table('banner_image')->where('id', '=', $removed_id[$i])->delete();
		}
	}
	

}?>