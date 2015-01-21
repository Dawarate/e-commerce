@extends('Layouts.master')

@section('title')
		Admin Panel 
@stop



@section('content')
	<h3> Admin Panel : </h3>

	{{ link_to_route('NewCategory', 'Add new Category') }} <br>

	@foreach($categories as $category)

	{{ link_to_route('EditCategory', $category->name , $category->id ) }}   ||  {{ link_to_route('DeleteCategory', 'delete', $category->id ) }}<br>

	@endforeach

@stop