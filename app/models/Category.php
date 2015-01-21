<?php 

/**
 * 
 */
 class Category extends Eloquent
 {
 	

 	public static $rules = ['name' => 'required|min:2'];
 	
 } ?>