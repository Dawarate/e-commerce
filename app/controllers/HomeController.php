<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$products   = Product::all();
		$categories = Category::all();
		return View::make('hello')->withCategories($categories)->withProducts($products);
	}

	public function authenticate()
	{
		$validation = Validator::make(Input::all(),User::$auth_rules);

		if($validation->fails())
				{
					return Redirect::back()->withInput()->withErrors($validation->messages());
				}

		$email    = Input::get('email');
		$password = Input::get('password');

		if(Auth::attempt(array('email' => $email, 'password' => $password)))
		{

			$user = Auth::user();
			if($user->role == 1){
				return Redirect::route('AdminIndex');
			}
			else {
				## go Shopping
			}
			
		}

		return Redirect::back()->withInput(); 
		Session::put('message', 'Sorry , no user was found with these credentials');
	}

	public function search()
		{
			$categories = Category::where('name', 'LIKE', '%'.Input::get('query').'%')->get();
			$products   = Product::where('name', 'LIKE', '%'.Input::get('query').'%')->orWhere('description', 'LIKE', '%'.Input::get('query').'%')->get();
			return View::make('search',compact('categories'))->withProducts($products);

		}

	public function getCategory($id)
		{
			$categories = Category::all();
			$products = Product::where('category_id', '=', $id)->get();

			return View::make('category',compact('categories'))->withProducts($products)->withCurrent($id);
		}

	public function addToCart($id=0, $qtt=0)
		{

			if($product = Product::find($id))
				{
					$old_cart = [];
					$item    = new Cart($id,$qtt);
					if(Session::has('cart'))
					{
						$old_cart = (array)Session::get('cart');
						
					}
					$old_cart[] = serialize($item);
					Session::put('cart',$old_cart);
					return json_encode('ok');
				}
			else {
				return json_encode('error');
			}
			

		}

	public function showCart()
		{
			$session_items = $cart_items = [];
			if(Session::has('cart') && !empty(Session::get('cart')))
				{
					
					$session_items = Session::get('cart');


					foreach($session_items as $item)
							{
								$unserialized_item = unserialize($item);

								$product = Product::find($unserialized_item->productId);
								$cart_item = new StdClass;
								$cart_item->p_id 	 = $product->id;
								$cart_item->name 	 = $product->name;
								$cart_item->image    = $product->image;
								$cart_item->price    = $product->price;
								$cart_item->qtt = $unserialized_item->qtt;

								$cart_item->total    = ($cart_item->price * $cart_item->qtt);
								
								$counter = 0;
								$found   = false;
								$index   = null;
								foreach($cart_items as $it)
								{
										if($it->p_id == $product->id)
												{
													$index = $counter;
													$found = true;
												}
										$counter++;
								}

								if($found)
									{
										$cart_items[$index]->qtt   = $cart_items[$index]->qtt + $cart_item->qtt;
										$cart_items[$index]->total = ($cart_items[$index]->qtt * $cart_item->price);
									}
								else {
									$cart_items[] = $cart_item;
								}
							}

							

				}
			return View::make('cart', compact('cart_items'));
		}


































	
}
