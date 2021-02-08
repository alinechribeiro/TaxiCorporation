<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/',

function () {
		return view('welcome');
	});

Route::get('list', [MemberController::class , 'show']);
Route::post('drivers', [MemberController::class , 'searchdriver']);
Route::post('searchcustomer', [MemberController::class , 'searchcustomer']);
Route::post('specifics', [MemberController::class , 'specifics']);