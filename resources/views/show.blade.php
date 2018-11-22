@extends('layouts.app')

@section('content')
<head><link href="{{ asset('css/background.css') }}" rel="stylesheet"></head>
<?php 
	$iniDt=date('d-m-Y',strtotime($eventos->inicio_evento));
 	$HrIni=date('H:i', 	strtotime($eventos->hora_inicio));
 	$fimDt=date('d-m-Y',strtotime($eventos->fim_evento));
 	$HrFim=date('H:i', 	strtotime($eventos->hora_fim));

$teste  = "abcd efgh i";
$teste = ucwords(strtolower($teste));
?>
<div class="ui inverted vertical masthead center aligned segment">
	<img src="a.jpg" alt="" style="width:100%, height>100%">
		<br><br><br><br><br>
		<h1 class="span">{{ucwords(strtolower($eventos->nome))}}</h1>
		@if($iniDt == $fimDt)
			<h2 class="opacity">{{$iniDt}} - {{$HrIni}} às {{$HrFim}}</h2>
		@else
			<h2 class="opacity">{{$iniDt}} - {{$HrIni}} às {{$fimDt}} - {{$HrFim}}</h2>
		@endif
		<h2 class="opacity">Campus {{ucwords(strtolower($eventos->campus))}} - IFPE </h2>
		<h2 class="opacity">{{ucwords(strtolower($eventos->campus))}}</h2>
	</div>
	<div class="ui container">
		<div class="position">
			<div class="ui segment">
				<center><span><h1>Programação do evento</h1></span></center>
				<!-- <div class="ui green divider"></div> -->
				<table class="ui green table">
					<thead>
						<tr>
							<th>Palestra</th>
							<th>Palestrante</th>
							<th>Horário</th>
							<th class="right aligned">Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>XXXXXXXXXXXXXX</td>
							<td>XXXXXX XXXXX</td>
							<td>00-00-00 Ás 00-00-00</td>
							<td class="right aligned">Confirmada</td>
						</tr>
						<tr>
							<td>XXXXXXXXXXXXXX</td>
							<td>XXXXXX XXXXX</td>
							<td>00-00-00 Ás 00-00-00</td>
							<td class="right aligned">Não Confirmada</td>
						</tr>
					</tbody>
				</table>
				
			</div>
			<div class="ui segment">
				<center><span><h1>Descrição do evento</h1></span></center>
				<div class="ui green divider"></div>
				<div class="justify">
					<center>
						<p>{{$eventos->descricao}}</p>
					</center>
				</div>
			</div>
			<div class="ui segment">
	@if(Auth::check())
				<center><span><h1>Inscreva-se</h1></span></center>
		@if($QuantVagas > 0)
			@foreach($participa as $participar)
				@if(Auth::user()->id == $participar->user_id)
						<form method="GET" action="{{url("/evento/{$participar->id}/destroy")}}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<br>
									<center>	
										<button class="ui green  button" type="submit">
											<i class="delete icon"></i>Deixar de participar
										</button>
									</center>	
								</br>
						</form>
					<?php $c = 1;?>
				@endif
			@endforeach
				@unless($c == 1)
				<div class="ui green divider"></div>
					<br>
						<center>
							<a href="{{url("/evento/{$eventos->id}/participar")}}">
								<button class="ui green button">Fazer inscrição</button>
							</a>
						</center>
					<br>
				@endunless
		@else
			<a href="#">Não há vagas</a><br>
		@endif
	@endif
			</div>
		</div>
		<br>
@endsection
