@extends('Layouts.master')

@section('title')
		Edit Product
@stop



@section('content')
	<h3> Edit Product : {{ $product->name }} </h3>

	


	<hr>

	{{ Form::model($product, array('route' => array('updateProduct', $product->id),'files'=>'true')) }}
		
		<p> {{ Form::label('name', 'Product Name : ') }} </p>
		<p> {{ Form::text('name') }} </p>
		<p> {{ $errors->first('name') }} </p>


		<p> {{ Form::label('description', 'Product Description : ') }} </p>
		<p> {{ Form::textarea('description') }} </p>
		<p> {{ $errors->first('description') }} </p>

		<p> {{ Form::label('price', 'Price : ') }} </p>
		<p> {{ Form::text('price') }} </p>
		<p> {{ $errors->first('price') }} </p>

		<p> {{ Form::label('category_id', 'Product Category : ') }} </p>
		<p> {{ Form::select('category_id', $categories, $product->category_id) }} </p>
		<p> {{ $errors->first('category_id') }} </p>

		<p> {{ Form::label('image', 'Product Image : ') }} </p>
		<p> {{ Form::file('image') }}   Current Image : {{ HTML::image($product->image,$product->name,array('width' => '100')) }} </p>
		<p> {{ $errors->first('image') }} </p>




		<p> {{ Form::submit('Update') }} </p>

	{{ Form::close()}}

@stop