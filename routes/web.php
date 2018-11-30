<?php

 /*Quando entrar vai direto para index*/
Route::get('/', 'EventoController@index');

/*treinamento*/
Route::get('many-to-many', 'EventoController@participar');

/*Resource que facilita chamar uma função do Controller*/
Route::resource('evento', 'EventoController');

/*Resource que facilita chamar uma função do Controller*/
Route::resource('atividade', 'AtividadeController');

/*Resource que facilita chamar uma função do Controller*/
Route::resource('palestrante', 'PalestranteController');

/* Criar Atividade*/
Route::get('/atividade/create/{id}', 'AtividadeController@create')->name('atividade.create');

/* Criar Palestrante*/
Route::get('/palestrante/create/{id}', 'PalestranteController@create')->name('palestrante.create');

/* rota tradicional do método Auth*/
Auth::routes();

/* Chamar  a função update*/
Route::get('/evento/{id}/update', 'HomeController@update');

/* Chamar  a função update*/
Route::get('/evento/atividade/{id}/edit', 'AtividadeController@edit')->name('atividade');;

/* Chamar a função upando*/
Route::get('/evento/{id}/participar', 'HomeController@participar');

/* Chamar a função myevent*/
Route::get('/evento/{id}/meuseventos', 'EventoController@myEvent');

/* Chamar a função gerenciaEvento*/
Route::get('/evento/{id}/gerenciaevento', 'EventoController@gerenciaEvento')->name('evento.gerenciaEvento');

/* Chamar a função checking*/
Route::get('/evento/{id}/checking', 'EventoController@checking')->name('evento.checking');

/* Chamar a função destroyParticipante*/
Route::get('/evento/{id}/destroy', 'HomeController@destroyParticipante');

/* Vai para a função index quando for para o home*/
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/palestrante/{id}/search/{query}', 'PalestranteController@search')->name('palestrante.search');
