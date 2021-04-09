<table>
	<tr>
		<th> Name: </th>
		<th> Email: </th>
		<th> Phone:  </th>
		<th> Date of Birth </th>
	</tr>
	@foreach($data as $data)
	<tr>
		<td> {{ $data->name }} </td>
		<td> {{ $data->email }} </td>
		<td> {{ $data->phone }} </td>
		<td> {{ $data->dob }} </td>
	</tr>
	@endforeach
</table>