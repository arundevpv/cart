<?php
class CategoryService{
	protected $categoryProvider;
	
	public function __construct($categoryProvider)
	{
		$this->categoryProvider = $categoryProvider;
		
	}
	/* * param status (boolean)
	   * @ return category(array)
	 */
    public function getAllCategory($status = NULL)
	{
		return $this->categoryProvider->getAll($status);
	}
	function add($categoryData)
	{
		$this->categoryProvider->add($categoryData);
	}
	function getCategory($id)
	{
		return $this->categoryProvider->getCategory($id);
	}
	function update($id,$categoryData)
	{
		$category=$this->getCategory($id);
		$category->name=$categoryData['name'];
		$category->photo=$categoryData['photo'];
		return $category->save();
	}
	function remove($id)
	{
		$category=$this->getCategory($id);
		return $category->delete();
	}
	function getMainCategories()
	{
		return $this->categoryProvider->getMainCategories();
	}
	function getSubCategories()
	{
		return $this->categoryProvider->getSubCategories();
	}
	function getSubCategoriesByParent($parent_id)
	{
		return $this->categoryProvider->getSubCategoriesByParent($parent_id);
	}
}?>