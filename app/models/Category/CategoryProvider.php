<?php
use App\Models\Category\Category;
class CategoryProvider{
	
	/* * reference the modal
	 */	
	private function createModel()
	{
		return new Category();		
	}
	/* * param $status (boolean)
	   * @ return category (array)
	*/
	public function getAll($status=NULL)
	{
		$category = $this->createModel();
		if($status==NULL)
		{			
			return $category::all();		
		}
		else
		{
			return $category::where('is_active','=',$status)->get();	
		}
	}
	function add($categoryData)
	{
		$category = $this->createModel();
		return $category::create($categoryData);
	}
	function getCategory($id)
	{
		$category = $this->createModel();
		return $category::find($id);
	}
	function getMainCategories()
	{
		$category = $this->createModel();
		return $category::where('parent_id','=',0)
						->where('is_active','=',1)
						/*->orderBy('name','asc')*/
						->get();
	}
	function getSubCategories()
	{
		$category = $this->createModel();
		return $category::where('is_active','=',1)
						->where('parent_id','!=',0)
						->orderBy('name','asc')
						->get();
	}
	function getSubCategoriesByParent($parent_id)
	{
		$category = $this->createModel();
		return $category::where('parent_id','=',$parent_id)
						->where('is_active','=',1)
						->orderBy('name','asc')
						->get();
	}
}?>