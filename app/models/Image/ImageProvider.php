<?php
use App\Models\Image\Image;
class ImageProvider{
	
	/* * reference the modal
	 */	
	private function createModel()
	{
		return new Image();		
	}
	
}?>