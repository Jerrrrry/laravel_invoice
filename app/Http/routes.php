<?php
use App\Task;
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

Route::get('/', function () {
	return view('welcome');
})->middleware('guest');

// Task Routes
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::delete('/finish/{task}','TaskController@finish');
Route::get('/restore/{tasksf}','TaskController@restore');



// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


//api test

get('api/ceshi',function(){
		return Task::take(5)->get();


});
Route::get('vuetest','VueController@index');
Route::get('learnvue',function(){
	
	return view('learnvue');

});

Route::get('api/gettasks',function(){
	return App\Task::latest()->get();

});
