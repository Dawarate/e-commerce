<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My E-commerce Shop </title>
	{{ HTML::style('css/style.css')}}
</head>
<body>
	<script> 
		function addToCart(id)
			{
				var qtt = $('#qnt').val();
				$.ajax({
					url: '/addToCart/'+id+'/'+qtt,
					dataType: 'JSON',
					type: 'post',
					success:function(data)
						{
							if(data == 'ok')
									{
										alert('Product added successfully to the cart');
									}
							else {
								alert('there was an error finding the selected product');}

						}
				});

				return false;
			}
		function resetT()
			{
				divholder = document.getElementById('quantity');
				divholder.innerHTML = '';
				$('.outer').css("display","none");
				return false;
			}
		function CartBox(id)
			{
	divholder = document.getElementById('quantity');
	divholder.innerHTML = '{{Form::open(array("id"=>"quantity-form"))}}{{ Form::label("qnt", "Quantity")}}{{ Form::text("qnt","1")}}<br><button class="submit" onClick="return addToCart('+id+');">Add to Cart</button><button onClick="return resetT();">cancel</button>{{Form::close()}}';

	$('.outer').css("display","table");
	$("label[for='quantity']").css('font-size','18px');
	var InputStyle = {
	      padding: "5px",
	      width: "35px"
	    };
	$(":input").css(InputStyle);
	
	var ButtonStyle = {
	      background : "orange",
	      padding: "10px",
	      color: "#fff",
	      width:"auto",
	      marginTop: "10px"
	    };
	$(":button").css(ButtonStyle);
	var SubmitStyle = {
	      background : "#0080C0",
	      padding: "10px",
	      color: "#fff",
	      width:"auto",
	      marginTop: "10px"
	    };
	$(":button.submit").css(SubmitStyle);
			}
	</script>
	<header>
		<div id="header-wrapper">
			<div id="logo">  {{link_to('/', 'MyShop', array('class' => 'logo'))}}</div> 
			<div id="search-form"> {{ Form::open(array('route' => 'search', 'method'=>'GET')) }}

									{{ Form::text('query',null, array('placeholder'=> 'search for products ... ')) }} 
									{{ Form::submit('search') }}

									{{ Form::close()}}

									</div>
			<div id="mycart"> 
				<a href=""><span> <?php include public_path().'/img/svg/cart.html'; ?> </span>  </a>
			</div>

		</div>
		
	</header>
	
	
	<div id="wrapper">
	<div class="outer">
		<div class="middle">
			<div id="quantity" class="inner">
			<!-- Where to put the quantity form -->
			</div>
		</div>
	</div>
	
	@yield('content')
			
	</div>
	{{ HTML::script('js/jquery.js')}}
	<footer>
		<p> all rights reserved to TheGentleTrainer </p>

		<div id="accepted-methods"> Accepted payment methods : 
				<span class="paypal-icon">
					<?php include public_path().'/img/svg/paypal.html'; ?>
				</span>
		</div>
	</footer>
</body>
</html>