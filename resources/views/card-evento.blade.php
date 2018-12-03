<?php 
	$iniDt=date('d-m-Y',strtotime($evento->inicio_evento));
 	$HrIni=date('H:i', 	strtotime($evento->hora_inicio));
 	$fimDt=date('d-m-Y',strtotime($evento->fim_evento));
 	$HrFim=date('H:i', 	strtotime($evento->hora_fim));
?>
<div class="card" style="padding: 3px;">
		<a class="ui @if(!$past) green @endif ribbon label" style="position:absolute;z-index: 10; margin-left: 13px;margin-top: 10px;">{{$iniDt}} - {{$HrIni}} às {{$fimDt}} - {{$HrFim}}</a>
		<div class="image">
			@isset($evento->imagem)
				<img class="ui massive image" src="/img/evento/{{$evento->imagem}}">
			@else
				<img class="ui massive image" src="/B.jpg">
			@endisset
		</div>
	<div class="content" style="text-align: center;">
		<div class="header">{{$evento->nome}}</div>
		<div class="description" style="height: 10em;">
		  {{$evento->descricao}}	
		</div>
	</div>
	<div class="extra content">
		<a href="{{route('evento.show', $evento->id)}}">
			<div class="ui green fluid button">
				<i class="calendar icon"></i>
				<span class="ui inverted">Consultar Evento</span>
			</div>
		</a>
	</div>
</div>

	
