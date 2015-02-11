<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My E-commerce Shop </title>
	{{ HTML::style('css/style.css')}}
</head>
<body>
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