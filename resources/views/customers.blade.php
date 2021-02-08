@include('header')
<div class="container">
	<h1>Customer's Drives List</h1>
	<table class="table table-hover table-responsive">
		<thead>
			<tr>
				<th colspan="6">Customer Drives</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Id</td>
				<td>Name</td>
				<td>Email</td>
				<td>Destination</td>
				<td>Day</td>
				<td>Driver Name</td>
			</tr>

			@foreach($customers as $customer)

			<tr>
				<td>{{$customer->id}}</td>
				<td>{{$customer->fullname}}</td>
				<td>{{$customer->email}}</td>
				<td>{{$customer->destination}}</td>
				<td>{{$customer->day}}</td>
				<td>{{$customer->driverName}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@include('footer')