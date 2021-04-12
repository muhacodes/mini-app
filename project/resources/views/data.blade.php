@extends('base')
@section('title') 
<title> Data|show </title>
<style type="text/css">
	table th{
		border: 1px solid black;
	}
	table td{
		color: lightgray;
		padding: 7px;
		border: 1px solid gray;
	}
</style>
@stop
@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-lg-12">
			<h2> |Form Data </h2>
			<a class="btn btn-danger" href="{{ route('logout') }}"> Logout </a>
			<a class="btn btn-info" href="{{ route('pdf') }}"> Download all as PDF </a>
			<a class="btn btn-primary" href="{{ route('data.create') }}"> Enter Data </a>
			<table width="100%" class="table-dark">
				<tr>
					<th> Name: </th>
					<th> Email: </th>
					<th> Phone </th>
					<th> Date-of-birth </th>
					<th> Action </th>
				</tr>
				@foreach($data as $data)
				<tr>
					<td> {{ $data->name }} </td>
					<td> {{ $data->email }} </td>
					<td> {{ $data->phone }} </td>
					<td> {{ $data->dob }}</td>
					<td> <a href="{{ route('pdf_data', $data->id)  }}" class="btn-sm btn-primary" href="#"> PDF </a> </td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@stop

</body>
</html>