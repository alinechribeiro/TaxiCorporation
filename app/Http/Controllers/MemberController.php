<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller {

	//
	function show() {
		$data = Member::all()->where('id', '3');
		return view('list', ['members' => $data]);
	}

	// query on database tables with join left on the members table, drivers, vehicles and customers tables.
	// it retrieves driver's drives by driverId
	function searchdriver(Request $request) {
		$driverId = $request->input('driverId');
		$data     = DB::table('members')
			->join('drivers', 'members.driverId', '=', 'drivers.id')
			->join('vehicles', 'members.carId', '=', 'vehicles.id')
			->join('customers', 'members.customerId', '=', 'customers.id')
			->where('drivers.id', $driverId)	->get();
		return view('drivers', ['drivers' => $data]);
	}

	// query on database table customers to retrieve customer's drives
	function searchcustomer(Request $request) {
		$customerId = $request->input('customerId');
		$data       = DB::table('members')
			->join('drivers', 'members.driverId', '=', 'drivers.id')
			->join('vehicles', 'members.carId', '=', 'vehicles.id')
			->join('customers', 'members.customerId', '=', 'customers.id')
			->where('customers.id', $customerId)	->get();
		return view('customers', ['customers' => $data]);
	}

	// get driver id from specific day and specific car
	function specifics(Request $request) {
		$day   = $request->input('day');
		$plate = $request->input('plate');
		$data  = DB::table('members')
			->join('vehicles', 'members.carId', '=', 'vehicles.id')
			->join('drivers', 'members.driverId', '=', 'drivers.id')
			->join('customers', 'members.customerId', '=', 'customers.id')
			->whereRaw('members.day =? and vehicles.plate =?', [$day, $plate])	->get();
		return view('specific', ['information' => $data]);
	}

}
