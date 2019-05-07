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



Auth::routes();

Route::group(['middleware' => ['auth']], function() {

  Route::get('/', 'UsersController@index');

  Route::get('/home', function(){
    return view('/dashboard');
  });

  Route::get('/users', 'UsersController@getUsers');
  Route::post('/users', 'UsersController@searchUsers');

  Route::delete('/users/{id}', 'UsersController@destory');

  Route::get('/users/register', 'UsersController@createUser');
  Route::post('/users/register', 'Auth/RegisterController@create');
  Route::get('/users/create', 'UsersController@createUser');
  Route::post('/users/create', 'UsersController@store');

  Route::get('/users/{id}', 'UsersController@editUsers');
  Route::post('/users/update/{id}', 'UsersController@updateUser');

  Route::resource('roles', 'RolesController');

  Route::get('/roles/edit/{id}', 'RolesController@editRole');
  Route::post('/roles/edit/{id}', 'RolesController@updateRole');

    Route::resource('employees', 'EmployeesController');

  Route::get('/employees', 'EmployeesController@getUsers');
  Route::post('/employees', 'EmployeesController@searchUsers');

  Route::get('/employees/{id}', 'EmployeesController@editUsers');

  Route::get('/employees/create', 'EmployeesController@createUser');
  Route::post('/employees/create', 'EmployeesController@store');

  Route::post('/employees/update/{id}', 'EmployeesController@updateUser');


});

Route::get('api/users', 'ApiController@getUsers');
