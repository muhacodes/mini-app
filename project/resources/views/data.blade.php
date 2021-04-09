<!DOCTYPE html>
<html>
<head>
	<title> Data| </title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style type="text/css">
	table th{
		border: 1px solid black;
	}
	table td{
		color: lightgray;
	}
</style>
<body>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<h2> |Form Data </h2>
			<a class="btn btn-info" href="{{ route('pdf') }}"> Download all as PDF </a>
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

</body>
</html>