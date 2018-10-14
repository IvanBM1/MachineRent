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

Route::get('/','MainController@main');
Route::get('logout','SessionController@logout');
Route::get('machines','MachineController@list');

Route::get('/searchmachines','MachineController@search');
Route::get('/searchclients','ClientController@search');
Route::get('/searchemployee','EmployeeController@search');
Route::get('/searchaddress','AddressController@search');

Route::get('/address/create/{id}','AddressController@create');
Route::get('/employee/create/{id}','EmployeeController@create');

Route::post('login','SessionController@login');

Route::resource('user','UserController');
Route::resource('rent','RentController');
Route::resource('payment','PaymentController');
Route::resource('machine','MachineController');
Route::resource('machinerent','MachinerentController');

Route::resource('client','ClientController');
Route::resource('phone','PhoneController');
Route::resource('email','EmailController');
Route::resource('address','AddressController');
Route::resource('employee','EmployeeController');