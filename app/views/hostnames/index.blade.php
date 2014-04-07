<!-- app/views/networks/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Networks</title>
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

<h1>All the networks</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	
	<tbody>
	@foreach($users as $key => $value)
                
                <tr>
                        <th colspan="5">User: {{ $value->uid }}</th>
                </tr>
                <tr>
                    <td>Networks:</td>
                </tr>
                <tr>                        
                        <td>Network ID</td>
			<td>Name</td>
			<td>IP</td>
			<td>Status</td>
			<td>Actions</td>
		</tr>
             
                @foreach($value->networks as $nkey => $network)
                        <tr>                        
                                <td>{{ $network->nid }}</td>
                                <td>{{ $network->n_name }}</td>
                                <td>{{ $network->n_ip }}</td>
                                <td>{{ $network->n_status ? "OK" : "NA" }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                        <!-- delete the Network (uses the destroy method DESTROY /networks/{id} -->
                                        {{ Form::open(array('url' => 'networks/' . $network->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Network', array('class' => 'btn btn-warning')) }}
                                        {{ Form::close() }}

                                        <!-- show the Network (uses the show method found at GET /networks/{id} -->
                                        <a class="btn btn-small btn-success" href="{{ URL::to('networks/' . $network->id) }}">Show this Network</a>

                                        <!-- edit this Network (uses the edit method found at GET /networks/{id}/edit -->
                                        <a class="btn btn-small btn-info" href="{{ URL::to('networks/' . $network->id . '/edit') }}">Edit this Network</a>

                                </td>
                        </tr>
                @endforeach
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>