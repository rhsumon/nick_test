<!-- app/views/networks/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Edit Network</title>
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

@if(!$network) :
<h1>No Data Found!</h1>
@else:
<h1>Edit {{ $network->n_name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($network, array('route' => array('networks.update', $network->nid), 'method' => 'PUT')) }}

        <div class="form-group">
		{{ Form::label('uid', 'User ID') }}
		{{ Form::select('uid', $users, $network->user->id, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('nid', 'Network ID') }}
		{{ Form::text('nid', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('n_name', 'Name') }}
		{{ Form::text('n_name', null, array('class' => 'form-control')) }}
	</div>

        <div class="form-group">
		{{ Form::label('n_ip', 'IP Address') }}
		{{ Form::text('n_ip', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('n_status', 'Status') }}
		{{ Form::select('n_status', array(1 => 'OK', 0 => 'NA'), null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the Network!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endif

</div>
</body>
</html>