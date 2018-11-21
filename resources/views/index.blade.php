@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<style>
		.ui.segment{
			width: 500px;
		}
	</style>
</head>
<body>
<br>
<br>
<br>
<br>
<div class="ui container">
	 <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info', 'update'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
  <div class="ui three column grid">
			
		@can('criar-evento')
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
		@endcan

<!-- Condição para saber se existe a variavel que lista -->
  @if (empty($eventos))
  	<!-- Se não existir aparece essa mensagem -->
          <br><h3 class="a">A variavel não exite!<br>Corija esse erro com urgência</h3>
        @else
		<!-- Se ela existir vai aparecer isso-->			
		<!-- Listar todos os atributos dos itens já cadastrados na tabela-->			
		 @foreach($eventos as  $evento)
		 
					<div style="float:left;">
						<a href="#">
							<div class="ui link cards">
								<div class="green card" style="">
									<div class="ui fluid image">
										<label class="ui green ribbon label">{{$evento->inicio_evento}} - {{$evento->hora_inicio}} às {{$evento->fim_evento}} - {{$evento->hora_fim}}</label>		
										<div class="image">
											@isset($evento->imagem)
												<img class="ui massive image" src="/../img/evento/{{$evento->imagem}}">
											@else
												<img class="ui massive image" src="B.jpg">
											@endisset
										</div>
									</div>
									<div class="content">
										<div class="header"><center>{{$evento->nome}}</center></div>
										<div class="description" >
											<center>
												<h5>
														kkkk												</h5>
											</center>	
										</div>
									</div>
									<div class="extra content">
										<a href="{{route('evento.show', $evento->id)}}">
											<div class="ui green inverted button" style="width: 100%;">
												<i class="calendar icon"></i>
												Consultar Evento
											</div>
									</a>
									</div>
								</div>
							</div> 
						</a>
					</div>	
			@endforeach
        @endif
</div>
</body>
</html>
@endsection