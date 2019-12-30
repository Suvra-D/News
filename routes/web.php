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

Route::get('/single','SingleController@index');

Route::group(['prefix'=>'back','middleware'=>'auth'],function() {
    Route::get('/','Admin\DashboardController@index');

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

    Route::get('/author','Admin\AuthorController@index');
    Route::get('/author/create','Admin\AuthorController@create');
    Route::post('/author/store','Admin\AuthorController@store');
    Route::get('/author/edit/{id}','Admin\AuthorController@edit');
    Route::put('/author/edit/{id}',['uses'=>'Admin\AuthorController@update','as'=>'author-update']);
    Route::delete('/author/delete/{id}','Admin\AuthorController@destroy');

    Route::get('/category','Admin\CategoryController@index');
    Route::get('/category/create','Admin\CategoryController@create');
    Route::post('/category/store','Admin\CategoryController@store');
    Route::put('/category/status/{id}','Admin\CategoryController@status');

    Route::get('/post','Admin\PostController@index');
    Route::get('/post/create','Admin\PostController@create');
    Route::post('/post/store','Admin\PostController@store');
    Route::put('/post/status/{id}','Admin\PostController@status');
    Route::delete('/post/delete/{id}','Admin\PostController@destroy');

    Route::get('/comment/{id}','Admin\CommentController@index');
    Route::get('/comment/reply/{id}','Admin\CommentController@create');
    Route::post('/comment/reply','Admin\CommentController@store');
});
Route::get('/query','DbController@index');
Route::get('/joining','DbController@joining');

Auth::routes();


