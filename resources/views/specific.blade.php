@include('header')
<div class="container">
	<h1>Driver on the Specific Day and Specific Car</h1>
	<table class="table table-bordered table-hover">
		<tbody>
			<tr>
				<td>Driver Id</td>
				<td>Driver Name</td>
				<td>Car Plate</td>
				<td>Car Type</td>
				<td>Day</td>
				<td>Destination</td>
				<td>Customer Name</td>
				<td>Price</td>
			</tr>

			@foreach($information as $info)

			<tr>
				<td>{{$info->driverId}}</td>
				<td>{{$info->driverName}}</td>
				<td>{{$info->plate}}</td>
				<td>{{$info->type}}</td>
				<td>{{$info->day}}</td>
				<td>{{$info->destination}}</td>
				<td>{{$info->fullname}}</td>
				<td>{{$info->price}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@include('footer')