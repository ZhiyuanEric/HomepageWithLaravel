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
    if(Auth::user() != null) {
        return Redirect::to('/users');
    }
    return view('welcome');
});
Route::get('users', 'UsersController@index');
Route::post('users', 'UsersController@edit')->name('updateuser');
Route::get('logout', function(){
    Auth::logout();
    return view('welcome');
});
Route::get('users/login', 'UsersController@login')->name('loginuser');
Route::post('users/login', 'UsersController@check')->name('checkuser');
Route::get('users/create', 'UsersController@create')->name('createuser');
Route::post('users/create', 'UsersController@store')->name('storeuser');
Route::get('users/alluser', 'UsersController@alluser')->name('alluser');
Route::get('users/alluser/{id}', 'UsersController@show')->name('showuser');
//Route::any('users/update/{types}', 'UsersController@update');