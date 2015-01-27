
	<h3> Login : </h3>

	
	@if(Session::has('message'))
		{{ Session::get('message')}}
	@endif
	<hr>

	{{ Form::open(array('route' => 'authenticate')) }}
		
		<p> {{ Form::label('email', 'Email: ') }} </p>
		<p> {{ Form::email('email') }} </p>
		<p> {{ $errors->first('email') }} </p>


		<p> {{ Form::label('password', 'Password : ') }} </p>
		<p> {{ Form::password('password') }} </p>
		<p> {{ $errors->first('password') }} </p>

		<p> {{ Form::submit('Add') }} </p>
	{{ Form::close() }}
