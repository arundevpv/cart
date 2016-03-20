<?php
/*
	**Created By Arun @ Itmarkerz (30/1/15)
*/
namespace facades;
use Illuminate\Support\Facades\Facade;

class User extends Facade {

	protected static function getFacadeAccessor() {
		return 'user';
	}
}
?>