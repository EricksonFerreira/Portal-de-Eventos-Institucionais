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
<!-- Condição para saber se existe a variavel que lista -->
  @if (empty($Eventos))
  	<!-- Se não existir aparece essa mensagem -->
          <br><h3 class="a">A variavel não exite!<br>Corija esse erro com urgência</h3>
        @else
		<!-- Se ela existir vai aparecer isso-->			
		<!-- Listar todos os atributos dos itens já cadastrados na tabela-->			
		@foreach($Eventos as  $evento)
			 <div class="a">
						<div>Id 		: {{$evento->id}}</div>
						<div>Nome 		: {{$evento->nome}}</div>
						<div>Descricao 	: {{$evento->descricao}}</div>
						<div>Email 		: {{$evento->email}}</div>
						<div>telefone 	: {{$evento->telefone}}</div>
						<div>created 	: {{$evento->created_at}}</div>
						<div>update 	: {{$evento->update_at}}</div>
						<div>Inicio 	: {{$evento->inicio_evento}}</div>
						<div>Fim 		: {{$evento->fim_evento}}</div>
				<!-- Lista o nome do Autor que está na tabela user o atributo name-->			
						<div>Autor 	: {{$evento->user_id}}</div>	
		<!--  Botão que cadastra o usuario na tabela participar -->
		 	@can('participa-evento', $evento)
				<a href="{{url("/evento/{$evento->id}/upando")}}">participar</a><br>
			@endcan
		
			<!-- Pega a função de app\Providers\AuthServiceProvider.php
				 Caso esteja de acordo com o provider ele vai fazer aparecer o que está dentro-->	
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