<?php 

/**
 * 
 */
 class AdminController extends BaseController
 {
 	
 	public function welcome()
 		{
 			$categories = Category::all();
 			return View::make('admin.index', compact('categories'));
 		}

 	public function newCategory()
 		{
 			return View::make('admin.newCat');
 		}

 	public function storeCategory()
 		{
 			

 			$validation = Validator::make(Input::all(), Category::$rules);

 			if($validation->fails())
 			{

				return Redirect::back()->withInput()->withErrors($validation->messages());
 			}

 			$category = new Category;

 			$category->name = Input::get('name');

 			$category->save();

 			return Redirect::route('AdminIndex');
 		}


 		public function editCategory($id)
 		{
 			if($category = Category::find($id))
 			{
 				return View::make('admin.editCat', compact('category'));
 			}
 			else {
 				# 404 error page 
 			}
 			
 		}

 	public function updateCategory($id)
 		{
 			

 			$validation = Validator::make(Input::all(), Category::$rules);

 			if($validation->fails())
 			{

				return Redirect::back()->withInput()->withErrors($validation->messages());
 			}
 			$category = Category::find($id);

 			$category->name = Input::get('name');

 			$category->update();

 			return Redirect::route('AdminIndex');
 		}

 	public function deleteCategory($id){
 		$category = Category::find($id);
		$category->delete();
		return Redirect::route('AdminIndex');
 	}



































 } ?>