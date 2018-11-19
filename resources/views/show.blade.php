@extends('layouts.app')

@section('content')
		<div>Id 		: {{$Eventos->id}}</div>
		<div>Nome 		: {{$Eventos->nome}}</div>
		<div>Descricao 	: {{$Eventos->descricao}}</div>
		<div>Email 		: {{$Eventos->email}}</div>
		<img class="ui large rounded image" src="../img/evento/{{$Eventos->imagem}}" style="width:30em; height: 16.8em;">
		<div>vagas 		: {{$Eventos->vagas}}</div>
		<div>telefone 	: {{$Eventos->telefone}}</div>
		<div>created 	: {{$Eventos->created_at}}</div>
		<div>update 	: {{$Eventos->update_at}}</div>
		<div>Inicio 	: {{$Eventos->inicio_evento}}</div>
		<div>Fim 		: {{$Eventos->fim_evento}}</div>
		<a href="{{url("/evento/{$Eventos->id}/upando")}}">participar</a><br>
@endsection