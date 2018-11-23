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