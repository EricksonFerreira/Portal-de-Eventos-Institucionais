<?php

 /*Quando entrar vai direto para index*/
Route::get('/', 'EventoController@index');

/*treinamento*/
Route::get('many-to-many', 'EventoController@participar');

/*Resource que facilita chamar uma função do Controller*/
Route::resource('evento', 'EventoController');

/*Resource que facilita chamar uma função do Controller*/
Route::resource('atividade', 'AtividadeController');

/* rota tradicional do método Auth*/
Auth::routes();

/* Chamar  a função update*/
Route::get('/evento/{id}/update', 'HomeController@update');

/* Chamar  a função update*/
Route::get('/atividade/{id}/update', 'AtividadeController@update');

/* Chamar a função upando*/
Route::get('/evento/{id}/participar', 'HomeController@participar');

/* Chamar a função myevent*/
Route::get('/evento/{id}/meuseventos', 'EventoController@myEvent');

/* Chamar a função destroyParticipante*/
Route::get('/evento/{id}/destroy', 'HomeController@destroyParticipante');

/* Vai para a função index quando for para o home*/
Route::get('/home', 'HomeController@index')->name('home');
