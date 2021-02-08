@include('header')
<div class="container">
	<h1>Driver's Drives List</h1>
	<table class="table table-hover table-responsive">
		<thead>
			<tr>
				<th colspan="4">Drivers</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Id</td>
				<td>Name</td>
				<td>Licence Type</td>
				<td>Day</td>
				<td>Price</td>
				<td>Car Type</td>
				<td>Customer Name</td>
			</tr>

			@foreach($drivers as $driver)

			<tr>
				<td>{{$driver->id}}</td>
				<td>{{$driver->driverName}}</td>
				<td>{{$driver->licence}}</td>
				<td>{{$driver->day}}</td>
				<td>{{$driver->price}}</td>
				<td>{{$driver->type}}</td>
				<td>{{$driver->fullname}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@include('footer')