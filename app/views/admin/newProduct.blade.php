@extends('Layouts.master')

@section('title')
		Add new Product
@stop



@section('content')
	<h3> Add new Product : </h3>

	


	<hr>

	{{ Form::open(array('route' => 'storeProduct','files'=>'true')) }}
		
		<p> {{ Form::label('name', 'Product Name : ') }} </p>
		<p> {{ Form::text('name') }} </p>
		<p> {{ $errors->first('name') }} </p>


		<p> {{ Form::label('description', 'Product Description : ') }} </p>
		<p> {{ Form::textarea('description') }} </p>
		<p> {{ $errors->first('description') }} </p>

		<p> {{ Form::label('price', 'Price : ') }} </p>
		<p> {{ Form::text('price') }} </p>
		<p> {{ $errors->first('price') }} </p>

		<p> {{ Form::label('category', 'Product Category : ') }} </p>
		<p> {{ Form::select('category', $categories) }} </p>
		<p> {{ $errors->first('category') }} </p>

		<p> {{ Form::label('image', 'Product Image : ') }} </p>
		<p> {{ Form::file('image') }} </p>
		<p> {{ $errors->first('image') }} </p>


		<p> {{ Form::submit('Add') }} </p>

	{{ Form::close()}}

@stop