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

Route::get('/', function()
{
	return View::make('hello');
});



Route::group(array('prefix' => 'admin'), function(){


Route::get('/', array('uses' => 'AdminController@welcome', 'as' => 'AdminIndex'));
Route::get('/newCategory', array('uses' => 'AdminController@newCategory' , 'as' => 'NewCategory'));


Route::get('/deleteCategory/{id}', array('uses' => 'AdminController@deleteCategory' , 'as' => 'DeleteCategory'));

Route::get('/editCategory/{id}', array('uses' => 'AdminController@editCategory' , 'as' => 'EditCategory'));
Route::post('/storeCategory', array('uses' => 'AdminController@storeCategory' , 'as' => 'storeCat'));
Route::post('/updateCategory/{id}', array('uses' => 'AdminController@updateCategory' , 'as' => 'updateCat'));
});