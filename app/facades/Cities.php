<?php
/*
	 * Created By Arun @ Itmarkerz (6/2/15) 
*/
namespace facades;
use Illuminate\Support\Facades\Facade;

class Cities extends Facade {

	protected static function getFacadeAccessor() {
		return 'cities';
	}
}
?>