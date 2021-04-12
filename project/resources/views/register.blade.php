@extends('base')
@section('title')  
	<title> Login | Account </title>
@stop
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-7 py-5">
			@if ($errors->any())
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				            <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
			@endif
			<form method="POST" action="{{ route('register') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label> Username: </label>
					<input type="text" name="username" class="form-control"> <br>
					
					<label> Email: </label>
					<input type="email" name="email" class="form-control"> <br>

					<label> Password: </label>
					<input type="password" name="password" class="form-control"> <br>

					<input class="btn btn-sm btn-info" type="submit" value="Login">
				</div>
			</form>
		</div>
	</div>
</div>
@stop