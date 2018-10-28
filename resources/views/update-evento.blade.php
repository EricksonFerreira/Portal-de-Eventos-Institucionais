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
		 <input type="text" name="nome" value="{{$evento->nome}}">
		<label>Email: </label>
		 <input type="text" name="email" value="{{$evento->email}}">
		<label>Site: </label>
		 <input type="text" name="site" value="{{$evento->site}}">
		<label>Descrição: </label>
		 <input type="text" name="descricao" value="{{$evento->descricao}}">
		 <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

		  <input type="reset" value="Limpar">
		  <input type="submit" value="Atualizar">
	</form>

@endsection