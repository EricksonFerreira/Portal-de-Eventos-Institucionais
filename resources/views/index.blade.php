@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>

</head>
<body>
<br>
<br>
<br>
<br>
	 <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
  <div class="ui three column grid">
			<div class="column">
				<div class="ui segment">
					<center>
						<a href="{{route('evento.create')}}">
							<button class="ui basic medium button">
								<h1 class="ui green header">Novo Evento<br>
									<center><i class="plus large icon"></i></center>
								</h1>
							</button>
						</a>
					</center>	
				</div>
			</div>

<!-- Condição para saber se existe a variavel que lista -->
  @if (empty($Eventos))
  	<!-- Se não existir aparece essa mensagem -->
          <br><h3 class="a">A variavel não exite!<br>Corija esse erro com urgência</h3>
        @else
		<!-- Se ela existir vai aparecer isso-->			
		<!-- Listar todos os atributos dos itens já cadastrados na tabela-->			
		@foreach($Eventos as  $evento)
			<div class="column">
				<div class="ui green segment">
					<a class="ui green ribbon label">{{$evento->inicio_evento}} - {{$evento->hora_inicio}} às {{$evento->fim_evento}} - {{$evento->hora_fim}}</a><br></br>
					<img class="ui centered large rounded image" src="img/evento/{{$evento->imagem}}">
					<center><h3 class="ui header"><br>{{$evento->nome}}</h3></center>
					<center><h5 class="ui disabled header">{{$evento->descricao}}</h5></center>
					<div class="ui divider"></div>

			<!-- Pega a função de app\Providers\AuthServiceProvider.php
				 Caso esteja de acordo com o provider ele vai fazer aparecer o que está dentro-->
						@can('update-evento', $evento)
						<a href="{{url("/evento/{$evento->id}/update")}}">
								<button class="ui green inverted button ">
									<i class="edit icon"></i>Editar Evento
								</button>
							</a>
					<form method="POST" action="{{route('evento.destroy', $evento->id)}}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="ui green inverted button" type="submit">
								<i class="delete icon"></i>Deletar
							</button>
							</a>
						</form>
						@endcan
					<a href="#">			
						<button class="ui green  button">
							<i class="calendar icon"></i>Consultar Evento
						</button>
					</a>
				</div>
				</div>
			@endforeach
        @endif

</body>
</html>
@endsection