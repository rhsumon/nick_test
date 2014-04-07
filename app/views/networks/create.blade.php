<!-- app/views/network/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Create New Network</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('users') }}">Users</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('networks') }}">View All networks</a></li>
		<li><a href="{{ URL::to('networks/create') }}">Create a Network</a>
                    <li><a href="{{ URL::to('hostnames/create') }}">Create a Hostname</a>
	</ul>
</nav>

<h1>Create a Network</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'networks')) }}

        <div class="form-group">
		{{ Form::label('uid', 'User id') }}
		{{ Form::select('uid', $users, Input::old('uid'), array('class' => 'form-control')) }}
	</div>

        <div class="form-group">
		{{ Form::label('nid', 'Network ID') }}
		{{ Form::text('nid', Input::old('nid'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('n_name', 'Name') }}
		{{ Form::text('n_name', Input::old('n_name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('n_ip', 'IP') }}
		{{ Form::text('n_ip', Input::old('n_ip'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('n_status', 'Status') }}
		{{ Form::select('n_status', array(1 => 'OK', 0 => 'NA'), Input::old('n_status'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Add Network!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>