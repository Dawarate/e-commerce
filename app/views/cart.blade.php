@extends('layouts.main')
@section('content')		
			
			
			<div id="products">
				<h2> My Cart </h2>
				
				@if(count($cart_items) > 0)
					
					<?php $total = 0; ?>
					<table >
						<thead>
							<td>  </td>
							<td> Product Name </td>
							<td> Price </td>
							<td> Quantity </td>
							<td>  </td>
						</thead>
					{{ Form::open(array('route' => 'pay')) }}	
					<?php $counter = 0; ?>
					@foreach($cart_items as $item)

							<tr>
								<td> {{ HTML::image($item->image,$item->name, array( 'width' => '100', 'height' => '100')) }} </td>
								<td> {{ $item->name }} {{ Form::hidden('item_name'.$counter, $item->name )}}</td>
								<td> {{ $item->price}} {{ Form::hidden('item_price'.$counter, $item->price )}}</td>
								<td> {{ $item->qtt }}  {{ Form::hidden('item_qtt'.$counter, $item->qtt )}}</td>
								<td> {{ $item->total }}</td>
							</tr>
							<?php $counter++; $total = $total + $item->total; ?>
					@endforeach		
						
						 <tr>
						 	<td></td>
						 	<td></td>
						 	<td></td>
						 	<td> Total </td>
						 	<td> {{$total}} {{ Form::hidden('total', $total )}} </td>
						 </tr>
					</table>
	
	<div id="pay">
		<a href="">{{ Form::submit('Pay with paypal') }}</a>
	</div>	

				@else
				 Please , select products to add to your cart
				@endif

			   
			</div> <!-- end of products -->
@stop		
	