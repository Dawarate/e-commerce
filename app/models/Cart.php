<?php 

/**
 * 
 */
 class Cart 
 {

 	public $productId;
 	public $qtt;
 	
 	function __construct($id, $qtt)
 	{
 		$this->productId = $id;
 		$this->qtt       = $qtt;
 	}
 } ?>