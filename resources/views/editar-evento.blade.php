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
		 <input type="text" name="nome" value="{{$evento->nome or old('nome')}}">
		<label>Email: </label>
		 <input type="text" name="email" value="{{$evento->email or old('email')}}">
		<label>Site: </label>
		 <input type="text" name="site" value="{{$evento->site or old('site')}}">
		<label>Descrição: </label>
		 <input type="text" name="descricao" value="{{$evento->descricao or old('descricao')}}">

		  <input type="reset" value="Limpar">
		  <input type="submit" value="Atualizar">
	</form>

@endsection