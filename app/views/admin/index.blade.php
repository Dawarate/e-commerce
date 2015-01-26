@extends('Layouts.master')

@section('title')
		Admin Panel 
@stop



@section('content')
	<h3> Admin Panel : </h3>

	
<h2> Categories </h2>
	@foreach($categories as $category)

	{{ link_to_route('EditCategory', $category->name , $category->id ) }}   ||  {{ link_to_route('DeleteCategory', 'delete', $category->id ) }}<br>

	@endforeach


<h2> Products </h2>
	@foreach($products as $product)

	{{ link_to_route('EditProduct', $product->name , $product->id ) }}   ||  {{ link_to_route('DeleteProduct', 'delete', $product->id ) }}<br>

	@endforeach

@stop