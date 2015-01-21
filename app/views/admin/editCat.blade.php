@extends('Layouts.master')

@section('title')
		Editing Category 
@stop



@section('content')
	<h3> Editing the Category {{ $category->name }} </h3>

	{{ link_to_route('NewCategory', 'Add new Category') }} 


	<hr>

	{{ Form::model($category, array('route' => array('updateCat', $category->id))) }}
		
		<p> {{ Form::label('cat_name') }} </p>
		<p> {{ Form::text('name') }} </p>
		<p> {{ $errors->first('name') }} </p>

		<p> {{ Form::submit('Update') }} </p>

	{{ Form::close()}}

@stop