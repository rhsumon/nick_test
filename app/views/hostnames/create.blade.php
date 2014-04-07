<!-- app/views/Hostname/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Create New Hostname</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('users') }}">Users</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('hostnames') }}">View All Networks</a></li>		
                <li><a href="{{ URL::to('hostnames/create') }}">Create a Hostname</a>
	</ul>
</nav>

<h1>Create a Hostname</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'hostnames')) }}

        <div class="form-group">
		{{ Form::label('uid', 'User id') }}
		{{ Form::select('uid', $users, Input::old('uid'), array('class' => 'form-control')) }}
	</div>

        <div class="form-group">
		{{ Form::label('hostname', 'Hostname') }}
		{{ Form::text('hostname', Input::old('hostname'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('block', 'Block') }}
		{{ Form::select('block', array(1 => 'YES', 0 => 'NO'), Input::old('block'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Add Hostname!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>