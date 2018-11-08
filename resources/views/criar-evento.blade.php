@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Criar Evento</title>
</head>
<body>
		<ol>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ol>
	<h1>Criar Evento</h1>
	<a href="{{route('evento.index')}}">Index</a>
	<form action="{{route('evento.store')}}" method="POST">
		<label>Nome: </label>
		<input type="text" name="nome" value="{{old('nome')}}">
		<label>Descrição: </label>
		<input type="text" name="descricao" value="{{old('descricao')}}">
		<label>Email: </label>
		<input type="text" name="email" value="{{old('email')}}">
		<label>Telefone: </label>
		<input type="text" name="telefone" value="{{old('telefone')}}">
		<label>Imagem: </label>
		<input type="file" name="imagem" value="{{old('imagem')}}">
		<label>vagas: </label>
		<input type="number" name="vagas" value="{{old('vagas')}}">
		<br>
		<label>inicio evento: </label>
		<input type="datetime-local" name="inicio_evento" value="2018-10-28T00:00" min="2018-10-28T00:00">
		<label>Fim: </label>
		<input type="datetime-local" name="fim_evento" value="2018-10-28T00:00" min="2018-10-28T00:00">
		<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" value="Enviar">
	</form>

</body>
</html>
@endsection