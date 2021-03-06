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

Route::get('/', [
'uses' => 'TasksController@getTasks',
'as' => 'getTasks'
]);

Route::get('tasks/edit/{id}',[
'uses' => 'TasksController@editTask',
'as' => 'editTask',
'middleware' => 'auth'
]);

Route::post('tasks/edit',[
	'uses' => 'TasksController@postEditTask',
	'as' => 'postEditTask',
	'middleware' => 'auth'
]);

Route::get('tasks/delete/{id}',[
'uses' => 'TasksController@deleteTask',
'as' => 'deleteTask',
'middleware' => 'auth'
]);

Route::post('tasks/add',[
	'uses' => 'TasksController@addTask',
	'as' => 'addTask',
	'middleware' => 'auth'

]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
