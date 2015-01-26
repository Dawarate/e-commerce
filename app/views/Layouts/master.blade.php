<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title') </title>
</head>
<body>

		{{ link_to_route('NewCategory', 'Add new Category') }} &nbsp; || &nbsp; {{ link_to_route('NewProduct', 'Add new Product') }} <br>
	
		@yield('content')
</body>
</html>