@extends('layouts.main')
@section('content')	

<h2> Search Result </h2>

	<h4> Categories </h4>
	@unless(count($categories) == 0)
		@foreach($categories as $category)
			{{$category->name}}
		@endforeach
	@endif


	<h4> Products </h4>
	
	@unless(count($products) == 0)
		@foreach($products as $product)
			{{$product->name}} <br>
			{{$product->description}} <hr>

		@endforeach
	@endif

@stop