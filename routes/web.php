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
Route::group(['prefix'=> 'api'], function() 
{
	Route::group(['prefix'=> 'users'], function() 
	{
		Route::get('', 'UserController@listUsers');

		Route::get('{id}', 'UserController@findUser');

		Route::post('', 'UserController@saveUser');

		Route::put('{id}', 'UserController@updateUser');

		Route::delete('{id}', 'UserController@deleteUser');
	});
});


Route::get('docs', function()
{
	return '<h1>Documentação</h1>';
});

Route::any('{catchall}', function() 
{
   	return Redirect::to('docs');
})->where('catchall', '.*');
