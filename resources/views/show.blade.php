@extends('layouts.app')

@section('content')
		<div>Id 				: {{$eventos->id}}</div>
		<div>Nome 				: {{$eventos->nome}}</div>
		<div>Descricao 			: {{$eventos->descricao}}</div>
		<div>Email 				: {{$eventos->email}}</div>
		<img class="ui large rounded image" src="../img/evento/{{$eventos->imagem}}" style="width:30em; height: 16.8em;">
		<div>vagas totais 		: {{$eventos->vagas}}</div>
		<div>vagas disponíveis	: {{$eventos->vagas - $participantes}}</div>
		<div>telefone 			: {{$eventos->campus}}</div>
		<div>created 			: {{$eventos->created_at}}</div>
		<div>update 			: {{$eventos->update_at}}</div>
		<div>Inicio 			: {{$eventos->inicio_evento}}</div>
		<div>Fim 				: {{$eventos->fim_evento}}</div>
		<div>Participantes		: {{$participantes}}</div>

	@if(Auth::check())
		@if($QuantVagas > 0)
			@foreach($participa as $participar)
				@if(Auth::user()->id == $participar->user_id)

					{{$participar->id}}

						<form method="GET" action="{{url("/evento/{$participar->id}/destroy")}}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="ui green inverted button" type="submit">
								<i class="delete icon"></i>Deixar de participar
							</button>
							</a>
						</form>
					<?php $c = 1;?>
				@endif
			@endforeach
				@unless($c == 1)
					<a href="{{url("/evento/{$eventos->id}/participar")}}">participar</a><br>
				@endunless
		@else
			<a href="#">Não há vagas</a><br>
		@endif
	@endif
@endsection
<div class="ui inverted vertical masthead center aligned segment">
		<br><br><br><br><br>
		<h1 class="span">{{$eventos->nome}}</h1>
		<h2 class="opacity">{{$eventos->inicio_evento}} - {{$eventos->hora_inicio}} às {{$eventos->fim_evento}} - {{$eventos->hora_fim}}</h2>
		<h2 class="opacity">Campus {{$eventos->campus}} - IFPE </h2>
		<h2 class="opacity">{{$eventos->campus}}</h2>
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
					<div class="ui header"><h1>XXXXXX</h1></div>
					<p>{{$eventos->descricao}}
					</p>
				</div>
			</div>
			<div class="ui segment">
				<center><span><h1>Inscreva-se</h1></span></center>
				<div class="ui green divider"></div>
				<br>
					<center><a href="inscreverEvento.php"><button class="ui green button">Fazer inscrição</button></a></center>
				<br>
				@if(Auth::check())
		@if($QuantVagas > 0)
			@foreach($participa as $participar)
				@if(Auth::user()->id == $participar->user_id)

					{{$participar->id}}

						<form method="GET" action="{{url("/evento/{$participar->id}/destroy")}}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="ui green inverted button" type="submit">
								<i class="delete icon"></i>Deixar de participar
							</button>
							</a>
						</form>
					<?php $c = 1;?>
				@endif
			@endforeach
				@unless($c == 1)
					<center><a href="{{url("/evento/{$eventos->id}/participar")}}"><button class="ui green button">Fazer inscrição</button></a></center><br>
				@endunless
		@else
			<a href="#">Não há vagas</a><br>
		@endif
	@endif
			</div>
		</div>