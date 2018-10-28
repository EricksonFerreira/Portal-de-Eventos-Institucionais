@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<style type="text/css">
	.a{
			border: 1px solid black;
			width: 15em;
			height: 7em;
			text-align: center;
			padding: 5px;
			border-radius: 10%;
		}
	</style>
</head>
<body>
	<h1>Bem Vindo ao Index</h1>
	<a href="{{route('evento.create')}}">Criar Evento</a><br><br>

  @if (empty($Eventos))
          <br><h3 class="a">A variavel não exite!<br>Corija esse erro com urgência</h3>
        @else
			@foreach($Eventos as  $evento)
			 <div class="a">
						<div>Nome : {{$evento->nome}}</div>
						<div>Email : {{$evento->email}}</div>
						<div>Site : {{$evento->site}}</div>
						<div>Descricao : {{$evento->descricao}}</div>
						<div>Author : {{$evento->user->name}}</div>
				@can('update-evento', $evento)
				<a href="{{url("/evento/{$evento->id}/update")}}">editar</a><br>
			<form method="POST" action="{{route('evento.destroy', $evento->id)}}">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="Delete">
				</form>
				@endcan
				<hr>

			 </div><br>
			@endforeach
        @endif

</body>
</html>
@endsection