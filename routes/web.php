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
Route::get('/', function () {
	return view('welcome');
});
Route::resource('evento', 'EventoController');
/*Route::get('/', function () {
return view('index');
});
Route::resource('evento', 'EventoController');
Route::get('create, EventoController@create')->name('create');
Route::get('index', 'EventoController@index')->name('index');
Route::post('store', 'EventoController@store');
Route::get('show/{evento}', 'EventoController@show');
Route::get('edit/{evento}/edit', 'EventoController@edit');
Route::patch('update/{evento}', 'EventoController@update');
Route::delete('destroy/{evento}', 'EventoController@destroy');
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
