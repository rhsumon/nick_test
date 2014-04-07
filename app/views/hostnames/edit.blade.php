<!-- app/views/hostnames/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Edit Hostname</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('users') }}">Users</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('networks') }}">View All Networks</a></li>
		<li><a href="{{ URL::to('hostnames/create') }}">Create a Hostname</a>
                    
	</ul>
</nav>

<h1>Edit {{ $hostname->n_name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($hostname, array('route' => array('hostnames.update', $hostname->id), 'method' => 'PUT')) }}

        <div class="form-group">
		{{ Form::label('uid', 'User ID') }}
		{{ Form::select('uid', $users, $hostname->user->id, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('hostname', 'Hostname') }}
		{{ Form::text('hostname', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('block', 'Block') }}
		{{ Form::select('block', array(1 => 'YES', 0 => 'NO'), null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the Hostname!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>