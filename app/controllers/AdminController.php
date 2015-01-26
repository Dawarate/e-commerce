<?php 

/**
 * 
 */
 class AdminController extends BaseController
 {
 	
 	public function welcome()
 		{
 			$categories = Category::all();
 			$products   = Product::all();
 			return View::make('admin.index', compact('categories'))->withProducts($products);
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
## Products 
public function newProduct()
 		{
 			$categories = Category::lists('name','id');
 			return View::make('admin.newProduct')->withCategories($categories); 
 		}

public function storeProduct()
 		{
 			
 				#dd(Input::all());
 			$validation = Validator::make(Input::all(), Product::$rules);

 			if($validation->fails())
 			{

				return Redirect::back()->withInput()->withErrors($validation->messages());
 			}

 			$product = new Product;

 			$product->name        = Input::get('name');
 			$product->description = Input::get('description');
 			$product->price       = Input::get('price');
 			$product->category_id = Input::get('category');

 			## Uploading image before saving it in the DB
 			$image    = Input::file('image');
 			$filename = time().'-'.$image->getClientOriginalName();
 			$path =public_path('/img/products/'.$filename);
 			Image::make($image->getRealPath())->save($path); ## equivalent  to move_uploaded_file in php 
			$product->image = '/img/products/'.$filename;
			$product->save();

 			return Redirect::route('AdminIndex');
 		}


public function editProduct($id)
 		{
 			if($product = Product::find($id))
 			{
 				$categories = Category::lists('name','id');
 				return View::make('admin.editProduct', compact('product'))->withCategories($categories);
 			}
 			else {
 				# 404 error page 
 			}
 			
 		}

 	public function updateProduct($id)
 		{
 			$validation = Validator::make(Input::all(), Product::$update_rules);

 			if($validation->fails())
 			{

				return Redirect::back()->withInput()->withErrors($validation->messages());
 			}
 			#dd(Input::all());
 			$product = Product::find($id);

 			$product->name        = Input::get('name');
 			$product->description = Input::get('description');
 			$product->price       = Input::get('price');
 			$product->category_id = Input::get('category_id');

 			
 			if(Input::hasFile('image')) ##check if an image was uploaded
 					{
 						## Uploading image before saving it in the DB
 						$image    = Input::file('image');
			 			$filename = time().'-'.$image->getClientOriginalName();
			 			$path = public_path('/img/products/'.$filename);
			 			Image::make($image->getRealPath())->save($path);
			 			File::delete('public/'.$product->image); ## delete the associated image
			 			$product->image ='/img/products/'.$filename;
 					}
 			$product->update();
			return Redirect::route('AdminIndex');
 		}

 	public function deleteProduct($id){
 		$product = Product::find($id);
 		File::delete('public/'.$product->image); ##delete the associated image
		$product->delete();
		return Redirect::route('AdminIndex');
 	}





























 } ?>