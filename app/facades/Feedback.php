<?php
/*
	*Created By Arun @ Itmarkerz (31/3/15)
*/
namespace facades;
use Illuminate\Support\Facades\Facade;

class Feedback extends Facade {

	protected static function getFacadeAccessor() {
		return 'feedback';
	}
}
?>