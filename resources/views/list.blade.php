@include('header')
<div class="container">
	<h1 class="bg-light">Taxi Corporation Application</h1>
	<div class="form-inner">
		<p>List all Drivers from a Driver. Please enter the Driver identification.</p>
		<form action="drivers" method="post" accept-charset="utf-8">
			@csrf
			<label>Driver Identification</label>
			<input type="text" value="" name="driverId" placeholder="Enter Driver Identification" />
			<button type="submit">List Driver's Drives</button>
		</form>
	</div>

	<div class="form-inner">
		<p>Search for all Drives of a Specific Customer. Please provide the Customer unique identification.</p>
		<form action="searchcustomer" method="post" accept-charset="utf-8">
			@csrf
			<input type="text" value="" name="customerId" placeholder="Enter Customer Identification" />
			<button type="submit">Search Customer's Drives</button>
		</form>
	</div>

	<div class="form-inner">
		<p>Search drivers by a specific DAY and CAR</p>
		<form action="specifics" method="post" accept-charset="utf-8">
			@csrf
			<label>Date</label>
			<input type="text" value="" name="day" placeholder="Enter Date" />
			<label>Car Plate</label>
			<input type="text" value="" name="plate" placeholder="Enter Plate" />
			<button type="submit" class="btn btn-primary">Search Specific Drivers</button>
		</form>
	</div>
</div>
@include('footer')