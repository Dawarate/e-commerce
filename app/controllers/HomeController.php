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
		return View::make('hello');
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

}
