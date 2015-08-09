<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
//    return view('user.login');
//});
Route::get('/', 'PagesController@index');
Route::get('/login', 'UserController@login');
Route::get('/reports', 'ReportsController@search');
Route::get('/reports/generate', 'ReportsController@generate');
Route::get('/logs', 'LogController@index');
Route::get('/inventory', 'InventoryController@index');
Route::get('/inventory/add', 'InventoryController@add');

// Resource
Route::resource('accounts', 'AccountsController');
Route::resource('employee', 'EmployeesController');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
