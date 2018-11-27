<?php 
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
					<label class="ui @if(!$past) green @endif ribbon label">{{$iniDt}} - {{$HrIni}} às {{$fimDt}} - {{$HrFim}}</label>		
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