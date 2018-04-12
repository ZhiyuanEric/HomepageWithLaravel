<?php

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
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $websites = DB::select('select * from websites', [1]);
    return view('welcome', ['websites' => $websites]);
});
Route::get('users', 'UsersController@index');
Route::get('users/create', 'UsersController@create')->name('createuser');
Route::get('users/{id}', 'UsersController@show')->name('showuser');
Route::post('users', 'UsersController@store')->name('storeuser');
