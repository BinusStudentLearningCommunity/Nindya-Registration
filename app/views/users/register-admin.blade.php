<html>
	<head>
		<title>REGISTRASI ADMIN</title>

		<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="col-md-12, text-center"><h4>REGISTRASI ADMIN</h4></div>
		<br><br>	
		<div class="container">
			{{ Form::open(array('action'=>'UsersController@postCreate', 'class'=>'form-signup')) }}
			    <h2 class="form-signup-heading">Please Register</h2>
			    {{ HTML::ul($errors->all()) }}
			    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}	    
			    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
			    {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
			 
			    {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
			{{ Form::close() }}
		</div>
<!-- 
		<form class="form-horizontal" action="{{route('Login.verif')}}" method="post">
			<div class="col-md-4 text-right control-label">Password
			</div>
			<div class="container-fluid, col-md-4 text-right">
				<input name="password" type="password" class="form-control" placeholder="Password" >
			</div>
			
			<div class="col-md-6 col-md-offset-4" style="color:#F00">
			</div>
		<br><br><br>
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</form>
		 -->
	</body>
</html>
