<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
	$UserController = new UserController(); 
	$users = $UserController->all();
	$mode = 0;
	return view('welcome', compact('users','mode'));
});

Route::put('/{id}/update', function ($id) {
	$UserController = new UserController(); 
	$users = $UserController->all();
	$mode = 1;
	return view('welcome', compact('users','mode','id'));
});


Route::group(['middleware' => ['web']], function () {
    Route::resource('users', 'UserController');
});