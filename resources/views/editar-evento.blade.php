@extends('layouts.app')

@section('content')
		<ol>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ol>
	<h1>Editar Evento</h1>
	<a href="{{route('evento.index')}}">Index</a>
	<form action="{{route('evento.update', $evento->id)}}" method="POST">{{ csrf_field() }}{{method_field('PUT')}}
		<label>Nome: </label>
		<input type="text" name="nome" value="{{old('nome')}}">
		<label>Descrição: </label>
		<input type="text" name="descricao" value="{{old('descricao')}}">
		<label>Email: </label>
		<input type="text" name="email" value="{{old('email')}}">
		<label>Telefone: </label>
		<input type="text" name="telefone" value="{{old('telefone')}}">
		<label>Imagem: </label>
		<input type="text" name="imagem" value="{{old('imagem')}}">
		<label>Inicio Evento: </label>
		<input type="date" name="created_at" value="{{old('created_at')}}">
		<label>Fim: </label>
		<input type="datetime-local" name="fim_evento" value="{{old('fim_evento')}}">
		 <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

		  <input type="reset" value="Limpar">
		  <input type="submit" value="Atualizar">
	</form>

@endsection