@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">

</head>
<body>
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
			

<!-- Condição para saber se existe a variavel que lista -->
  @if (empty($eventos))
  	<!-- Se não existir aparece essa mensagem -->
          <br><h3 class="a">A variavel não exite!<br>Corija esse erro com urgência</h3>
        @else
        <?php date_default_timezone_set("America/Recife");
setlocale(LC_ALL, 'pt_BR');
$created 	= date_create();?>
		<!-- Se ela existir vai aparecer isso-->			
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
		<!-- Listar todos os atributos dos itens já cadastrados na tabela-->
		<center><div style="width: 100%;">			
		 @foreach($eventos as  $evento)
		<?php 
			$date 		= date_format($created, 'd-m-Y');
			$iniDt=date('d-m-Y',strtotime($evento->inicio_evento));
		 	$HrIni=date('H:i', 	strtotime($evento->hora_inicio));
		 	$fimDt=date('d-m-Y',strtotime($evento->fim_evento));
		 	$HrFim=date('H:i', 	strtotime($evento->hora_fim));
		?>		
		<div style="float: left">
 			<a href="{{route('evento.show', $evento->id)}}">
				<div class="ui link cards">
					<div class="green card" style="">
						<div class="ui fluid image">
							<label class="ui green ribbon label">{{$iniDt}} - {{$HrIni}} às {{$fimDt}} - {{$HrFim}}</label>		
							<div class="image">
								@isset($evento->imagem)
									<img class="ui massive image" src="/img/evento/{{$evento->imagem}}">
									<p>oi</p>
								@else
									<img class="ui massive image" src="/B.jpg">
								@endisset
							</div>
						</div>
						<div class="content">
							<div class="header"><center>{{$evento->nome}}</center></div>
							<div class="description" style="height: 10em;">
								<center>
							  <h5>{{$evento->descricao}}</h5>
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
</div></center>

</body>
</html>
@endsection