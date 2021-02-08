# Taxi Corporation Project
The project is an application in PHP 7.4, Laravel 8, Bootstrap 4 and MySQL.
It consists in different views to:
1. List Customer's drives by Customer Id.
2. List Driver's drives by Driver Id.
3. Who was driving a specific car on a specific day.

## Structure of the Project
It is an Oriented Objected Project, with mainly four views on resources/views:
1. index.blade.php
2. drivers.blade.php: displays the drive's drives based on driver id. It instantiates the method 'searchdriver' and retrieves the data from the query join left from tables: members, drivers, vehicles and customers.
```
function searchdriver(Request $request) {
		$driverId = $request->input('driverId');
		$data     = DB::table('members')
			->join('drivers', 'members.driverId', '=', 'drivers.id')
			->join('vehicles', 'members.carId', '=', 'vehicles.id')
			->join('customers', 'members.customerId', '=', 'customers.id')
			->where('drivers.id', $driverId)	->get();
		return view('drivers', ['drivers' => $data]);
	}
```
3. customers.blade.php: displays the customer's drives. It instantiates the method 'searchcustomer' on the Controller 'MemberController' and through the Model 'Member' it makes a query on database table 'customers' (join left the members table, vehicles and drivers) to retrieve customer's drives details.
```
	function searchcustomer(Request $request) {
		$customerId = $request->input('customerId');
		$data       = DB::table('members')
			->join('drivers', 'members.driverId', '=', 'drivers.id')
			->join('vehicles', 'members.carId', '=', 'vehicles.id')
			->join('customers', 'members.customerId', '=', 'customers.id')
			->where('customers.id', $customerId)	->get();
		return view('customers', ['customers' => $data]);
	}
```

4. specific.blade.php: displays the result of customer's drives. It instantiates the class Members, the method 'specifics' which makes a query on the db tables: members, vehicles, customers and drivers through the join left query.
```
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
```

5. Using the same way, the project could validate the car types allowed based on the driver's licence. It is kepts on the tables vehicles (car type) and drivers (licence type: 'c' or 'd'). It is a simple method to retrieve the data.

## Instructions
1. Clone the project on github: 
2. Create databases and populate with random data to check results. 
3. Change .env file on the following fields to add the details of your database:

DB_DATABASE=CHANGE HERE

DB_USERNAME=CHANGE HERE

DB_PASSWORD=CHANGE HERE

4. The queries where made by the methods on Laravel 8. Following a guidance to create the tables:
// create drives table

```guidance to create the tables. 
CREATE TABLE `DB_NAME`.`members` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `driverId` INT NULL,
  `customerId` INT NULL,
  `destination` TEXT(255) NULL,
  `day` VARCHAR(45) NULL,
  `price` DOUBLE NULL,
  `carId` INT NULL,
  PRIMARY KEY (`id`));

//create drivers table
CREATE TABLE `DB_NAME`.`drivers` (
`id` INT NOT NULL,
`name` VARCHAR(45) NULL,
`licence` VARCHAR(45) NULL,
PRIMARY KEY (`id`));

//create vehicles table
CREATE TABLE `DB_NAME`.`vehicles` (
`id` INT NOT NULL,
`type` VARCHAR(45) NULL,
PRIMARY KEY (`id`));

//create customers table
CREATE TABLE `DB_NAME`.`customers` (
`id` INT NOT NULL,
`name` VARCHAR(45) NULL,
`email` VARCHAR(45) NULL,
PRIMARY KEY (`id`));

5. Run on terminal to update the styles:
```
$ npm run development
```

6. Run on terminal do access the project on localhost. The command will display the port.
```
$ php artisan serve
```
