<?php 

/**
 * 
 */
 class Product extends Eloquent
 {
 	
 	public static $rules = ['name' => 'required|min:3|alpha',
 							'description' => 'required|min:10',
 							'price' => 'required|numeric',
 							'image' => 'required|image|mimes:png,jpeg,jpg'];

 	public static $update_rules = ['name' => 'required|min:3|alpha',
 							'description' => 'required|min:10',
 							'price' => 'required|numeric',
 							'image' => 'image|mimes:png,jpeg,jpg'];

 } ?>