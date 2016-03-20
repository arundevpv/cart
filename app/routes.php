<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::post('search','HomeController@search');
Route::get('get-sub-categories/{category}','HomeController@showSub');
Route::get('get-main-categories','HomeController@showMain');
Route::post('feedback','FeedBackController@sendFeedback');
Route::group(array('prefix' => 'adds'),function(){	
	Route::get('/','AddController@addsForm');
	Route::post('post','AddController@save');
	Route::post('upload-image','AddController@uploadImage');
});
Route::group(array('prefix' => 'cities'),function(){
	Route::post('/','AddController@getCityByState');
});
Route::group(array('prefix' => 'admin'),function(){
	Route::get('/','AdminController@index');
	Route::post('authenticate','AdminController@authenticate');
	Route::group(array('before'=>'admin'),function() {
		Route::get('adds','AdminController@adds');
		Route::post('search','AdminController@search');
		Route::get('change-status/{status?}/{id?}','AddController@changeStatus');
		Route::get('logout','AdminController@logout');
		Route::group(array('prefix' => 'category'),function() {
			Route::get('/','CategoryController@addForm');
			Route::get('add/{id?}','CategoryController@addForm');
			Route::post('save','CategoryController@save');
			Route::get('edit/{id}','CategoryController@addForm');
			Route::get('remove/{id}','CategoryController@remove');
		});
		Route::group(array('prefix' => 'manufacture'),function() {
			Route::get('/','ManufacturerController@addForm');
			Route::get('add/{id?}','ManufacturerController@addForm');
			Route::post('save','ManufacturerController@save');
			Route::get('edit/{id}','ManufacturerController@addForm');
			Route::get('remove/{id}','ManufacturerController@remove');
		});
		Route::group(array('prefix' => 'banners'),function() {
			Route::get('/','BannerController@addForm');
			Route::get('add/{id?}','BannerController@addForm');
			Route::post('save','BannerController@save');
			Route::get('edit/{id}','BannerController@addForm');
			Route::get('remove/{id}','BannerController@remove');
			Route::post('upload-image','BannerController@uploadImage');
		});
		Route::group(array('prefix' => 'feedback'),function() {
			Route::get('/','FeedBackController@index');
			Route::get('remove/{id}','FeedBackController@remove');
		});
	});
});
Route::group(array('before'=>'isLoged'),function() {
Route::group(array('prefix' => 'users'),function(){
	Route::get('adds/update/{id}','AddController@addsForm');
	Route::post('adds/update','AddController@updateAdd');
	Route::get('dashboard','UserController@index');
	Route::get('adds/remove/{id?}','AddController@remove');
	Route::get('logout','UserController@logout');
});
});
Route::post('generate-password','UserController@generatePassword');
Route::post('login','UserController@login');