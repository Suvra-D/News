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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','HomeController@index');

/*Route::get('/category','CategoryController@index');*/

Route::get('/single','SingleController@index');

Route::group(['prefix'=>'back','middleware'=>'auth'],function() {
    Route::get('/','Admin\DashboardController@index');

    Route::get('/category','Admin\CategoryController@index');
    Route::get('/category/create','Admin\CategoryController@create');
    Route::get('/category/edit','Admin\CategoryController@edit');

    Route::get('/permission','Admin\PermissionController@index');
    Route::get('/permission/create','Admin\PermissionController@create');
    Route::post('/permission/store','Admin\PermissionController@store');
    Route::get('/permission/edit/{id}','Admin\PermissionController@edit');
    Route::put('/permission/edit/{id}',['uses'=>'Admin\PermissionController@update','as'=>'permission-update']);
    Route::delete('/permission/delete/{id}',['uses'=>'Admin\PermissionController@destroy','as'=>'permission-delete']);

    Route::get('/role','Admin\RoleController@index');
    Route::get('/role/create','Admin\RoleController@create');
    Route::post('/role/store','Admin\RoleController@store');
    Route::get('/role/edit/{id}',['uses'=>'Admin\RoleController@edit','as'=>'role-edit']);
    Route::put('/role/edit/{id}',['uses'=>'Admin\RoleController@update','as'=>'role-update']);
    Route::delete('/role/delete/{id}','Admin\RoleController@destroy');
});
Route::get('/query','DbController@index');
Route::get('/joining','DbController@joining');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
