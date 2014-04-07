<!-- app/views/users/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Create New User</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('networks') }}">Networks</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('users') }}">View All users</a></li>
		<li><a href="{{ URL::to('users/create') }}">Create new user</a>
	</ul>
</nav>

<h1>Create new User</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'users')) }}

        

        <div class="form-group">
		{{ Form::label('uid', 'User ID') }}
		{{ Form::text('uid', Input::old('uid'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Add User!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>