@extends('base')
@section('title') <title> Data|create </title>  @stop

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<h2> Form Data! </h2>
			<a class="btn btn-danger" href="{{ route('logout') }}"> Logout </a>
			@if ($errors->any())
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				            <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
			@endif
			<form method="post" action="{{ route('data.store') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label> Name: </label>
					<input type="text" name="name" value="{{ old('name') }}" class="form-control"> <br>

					<label> Email: </label>
					<input type="email" name="email" value="{{ old('email') }}" class="form-control"> <br>

					<label> Date of Birth: </label>
					<input type="date" name="date-of-birth" value="{{ old('date-of-birth') }}" class="form-control"><br>

					<label> Phone: </label>
					<input type="number" name="phone" value="{{ old('phone') }}" class="form-control">
				</div>

				<input class="btn-sm btn-success" type="submit" value="Submit">
			</form>
		</div>
	</div>
</div>
@stop