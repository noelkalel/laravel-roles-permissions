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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::redirect('/', '/login');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin:admin,user']], function () {
    Route::get('/',                                   'HomeController@index')->name('home');

    Route::get('/users',                              'UserController@index')->name('admin.users.index');
    Route::get('/users/create',                       'UserController@create')->name('admin.users.create');
    Route::post('/users',                             'UserController@store')->name('admin.users.store');
    Route::get('/users/{user:name}',                  'UserController@show')->name('admin.users.show');
    Route::get('/users/{user:name}/edit',             'UserController@edit')->name('admin.users.edit');
    Route::patch('/users/{user:name}',                'UserController@update')->name('admin.users.update');
    Route::delete('/users/{user:name}',               'UserController@destroy')->name('admin.users.destroy');    

    Route::get('/roles',                              'RoleController@index')->name('admin.roles.index');
    Route::get('/roles/create',                       'RoleController@create')->name('admin.roles.create');
    Route::post('/roles',                             'RoleController@store')->name('admin.roles.store');
    Route::get('/roles/{role:name}',                  'RoleController@show')->name('admin.roles.show');
    Route::get('/roles/{role:name}/edit',             'RoleController@edit')->name('admin.roles.edit');
    Route::patch('/roles/{role:name}',                'RoleController@update')->name('admin.roles.update');
    Route::delete('/roles/{role:name}',               'RoleController@destroy')->name('admin.roles.destroy');

    Route::get('/permissions',                        'PermissionController@index')->name('admin.permissions.index');
    Route::get('/permissions/create',                 'PermissionController@create')->name('admin.permissions.create');
    Route::post('/permissions',                       'PermissionController@store')->name('admin.permissions.store');
    Route::get('/permissions/{permission:name}',      'PermissionController@show')->name('admin.permissions.show');
    Route::get('/permissions/{permission:name}/edit', 'PermissionController@edit')->name('admin.permissions.edit');
    Route::patch('/permissions/{permission:name}',    'PermissionController@update')->name('admin.permissions.update');
    Route::delete('/permissions/{permission:name}',   'PermissionController@destroy')->name('admin.permissions.destroy');

});