<!-- app/views/users/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
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

<h1>All the users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
        <thead>
                <tr>                        
                        <td>User ID</td>			
			<td>Actions</td>
		</tr>
        </thead>
	<tbody>
	@foreach($users as $key => $value)
                
                <tr>                        
                        <td>{{ $value->uid }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                                <!-- delete the User (uses the destroy method DESTROY /users/{id} -->
                                {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete this user', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }}

                                <!-- show the User (uses the show method found at GET /users/{id} -->
                                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this User</a> -->

                                <!-- edit this User (uses the edit method found at GET /users/{id}/edit -->
                                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this User</a>

                        </td>
                </tr>                
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>