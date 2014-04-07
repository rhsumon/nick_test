<!-- app/views/users/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Edit user</title>
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
		<li><a href="{{ URL::to('users/create') }}">Create a user</a>
                    
	</ul>
</nav>

<h1>Edit {{ $user->uid }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}


	<div class="form-group">
		{{ Form::label('uid', 'User ID') }}
		{{ Form::text('uid', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>