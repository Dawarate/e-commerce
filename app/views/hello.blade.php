@extends('layouts.main')
@section('content')		
			
			<div id="categories">
				<h2> Categories </h2>
				<ul>
					@foreach($categories as $category)
						<li>  {{ link_to_route('getCategory', $category->name, $category->id) }} </li>
					@endforeach

				
				</ul>
			</div>
			<div id="products">
				<h2> New Products </h2>
			  <!-- Products listing -->
			  @foreach($products as $product)
			      <div class="product">
			        <a href="#">{{ HTML::image($product->image,$product->name, 
			        	array('class' => 'feature', 'width' => '240', 'height' => '127')) }}</a>
			       <a href="#" class="product-name">  <h3> {{$product->name}}</h3> </a>
					<p>
			          <a href="#" class="cart-btn" >
			            <span class="price">
			            	€ {{$product->price}}
			            </span>
			            {{HTML::image('img/white-cart.gif','Add to Cart')}}
			            ADD TO CART
			          </a>
			        </p>
			      </div>
			@endforeach
			     
				<!-- End of products listing -->
				<div id="pagination">
					<section id="pagination" style="text-align:center">
						{{ $products->links()}}
						
					</section>
				</div>
			   
			</div> <!-- end of products -->
@stop		
	