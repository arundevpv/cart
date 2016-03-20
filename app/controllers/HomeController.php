<?php

class HomeController extends BaseController {

	/*
	*/
	public function index()
	{ 
	 	$action=Session::get('action');
		if(!empty($action))
			return Redirect::to('users/dashboard');
		$end=Input::get('end');
		if(empty($end))
			$end=20;
		$start=$end-20;	
		$data['periods']=Config::get('rental_periods');
		$data['page_config']=Config::get('upforrent_config');
		$data['adds']=array();//Adds::latest($end,$start);	// 20 = count
		return View::make('home.index',$data);
	}
	/*
	*/
	public function search()
	{ 
		$params=array('category'=>Input::get('category'),
					  'location'=>Input::get('location'),
					  'searchKey'=>Input::get('searchKey')
		);
		$type=Input::get('type');
		if(empty($_POST['page']))
			unset($_POST['page']);
		if($type=='main' && !empty($params['category']))
		{
			$sub=array();
			$subCategories=Category::getSubCategoriesByParent($params['category']);
			foreach($subCategories as $subc)
			{
				$sub[]=$subc->id;
			}
			if(count($sub)<=0)
				$sub[]='';
			$params['category']=$sub;
		}
		if($params['category']!=0){
			if($type=='sub')
			{
				$category[]=$params['category'];
				$params['category']=$category;
			}
			$data['adds']=Adds::search($params,1);	// only active
		}
		else{
				$subCategories=Category::getSubCategories();	// list all adds
				foreach($subCategories as $subc)
				{
					$sub[]=$subc->id;
				}
				$params['category']=$sub;
				$data['adds']=Adds::search($params,1);	// only active
		}		
		$data['periods']=Config::get('rental_periods');
		return View::make('ajax.add_search',$data);
		
	}
	/*
	*/
	public function showSub($category)
	{
		$data['category']=Category::getCategory($category);
		$data['subCategories']=Category::getSubCategoriesByParent($category);
		return View::make('ajax.sub_cat',$data);
	}
	/*
	*/
	public function showMain()
	{
		$data['mainCategories']=Category::getMainCategories();	
		return View::make('ajax.main_cat',$data);
	}

}
