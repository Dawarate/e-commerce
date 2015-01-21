@extends('Layouts.master')

@section('title')
		Add new Category 
@stop



@section('content')
	<h3> Add new Category : </h3>

	{{ link_to_route('NewCategory', 'Add new Category') }} 


	<hr>

	{{ Form::open(array('route' => 'storeCat')) }}
		
		<p> {{ Form::label('cat_name', 'Category Name : ') }} </p>
		<p> {{ Form::text('name') }} </p>
		<p> {{ $errors->first('name') }} </p>

		<p> {{ Form::submit('Add') }} </p>

	{{ Form::close()}}

@stop