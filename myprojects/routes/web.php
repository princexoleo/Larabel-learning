<?php
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
    return view('welcome');
});

//here is another way to url mapping with the help of view method
//view methood contains URL and corresponding Blade file
Route::view('contact', 'contact');
Route::view('about','about');

Route::get('customers/','CustomerController@index'); // we can also this syntax to passing data with the help of controller
Route::get('customers/create','CustomerController@create');
Route::post('customers','CustomerController@store'); //store new customers details to database
Route::get('customers/{customer}','CustomerController@show'); //pass value via parameter 
Route::patch('customers/{customer}','CustomerController@update'); 
Route::get('customers/{customer}/edit','CustomerController@edit');
