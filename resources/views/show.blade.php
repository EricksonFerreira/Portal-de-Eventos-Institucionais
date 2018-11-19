@extends('layouts.app')

@section('content')
		<div>Id 		: {{$eventos->id}}</div>
		<div>Nome 		: {{$eventos->nome}}</div>
		<div>Descricao 	: {{$eventos->descricao}}</div>
		<div>Email 		: {{$eventos->email}}</div>
		<img class="ui large rounded image" src="../img/evento/{{$eventos->imagem}}" style="width:30em; height: 16.8em;">
		<div>vagas totais 		: {{$eventos->vagas}}</div>
		<div>vagas disponíveis		: {{$eventos->vagas - $participantes}}</div>
		<div>telefone 	: {{$eventos->telefone}}</div>
		<div>created 	: {{$eventos->created_at}}</div>
		<div>update 	: {{$eventos->update_at}}</div>
		<div>Inicio 	: {{$eventos->inicio_evento}}</div>
		<div>Fim 		: {{$eventos->fim_evento}}</div>
		<div>Participantes: {{$participantes}}</div>
		<a href="{{url("/evento/{$eventos->id}/upando")}}">participar</a><br>
@endsection