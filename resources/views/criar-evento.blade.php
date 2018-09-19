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
		<label>Email: </label>
		<input type="text" name="email" value="{{old('email')}}">
		<label>Site: </label>
		<input type="text" name="site" value="{{old('site')}}">
		<label>Descrição: </label>
		<input type="text" name="descricao" value="{{old('descricao')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" value="Enviar">
	</form>

</body>
</html>
@endsection