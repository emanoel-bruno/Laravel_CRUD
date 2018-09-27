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

Route::post('/search', 'UserController@search');


Route::group(['middleware' => ['web']], function () {
    Route::resource('users', 'UserController');
});


Route::get('/readsoftdelete', function () {
    // Try return deleted but return nothing
    // $post = Post::find(1);
    // return $post;

    // Return the deleted item
    // $post = Post::withTrashed()->where('id', 1)->get();
    // return $post;

    $post = Post::onlyTrashed()->where('id', 1)->get();
    return $post;

});

Route::get('/restore', function () {
    Post::withTrashed()->where('is_admin', 0)->restore();

});
Route::get('forcedelete', function () {
    // This delete all that the admin is 0
    // Post::withTrashed()->where('is_admin', 0)->forceDelete();
    //This function delete only trashed
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

});
