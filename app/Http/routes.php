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
Route::get('/', ['middleware' => 'auth', 'uses' => 'PagesController@index']);
Route::get('/login', 'UserController@login');
Route::get('/reports',  ['middleware' => 'auth', 'uses' => 'ReportsController@search']);
Route::get('/reports/generate', ['middleware' => 'auth', 'uses' => 'ReportsController@generate']);
Route::get('/logs', ['middleware' => 'auth', 'uses' => 'LogController@index']);
Route::get('/inventory', ['middleware' => 'auth', 'uses' => 'InventoryController@index']);
Route::get('/inventory/add', ['middleware' => 'auth', 'uses' => 'InventoryController@add']);

// Resource
Route::resource('accounts', 'AccountsController');
Route::resource('employee', 'EmployeesController');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


//
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController'
//]);
