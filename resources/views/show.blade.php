@extends('layouts.app')

@section('content')

 @foreach (['danger', 'warning', 'success', 'info', 'update'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
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
				@if($eventos->fim_evento > date('Y-m-d'))
					@can('update-evento', $eventos)
							<th>Editar Atividade</th>
							<th>Apagar Atividade</tr>
					@endcan
				@endif
						</tr>
					</thead>
					<tbody>
						@foreach($atividades as $atividade)
						<tr>
						<?php  	$AtvIni = date('d-m-Y H:i', 	strtotime($atividade->hora_inicio)); ?>
						<?php  	$AtvFim = date('d-m-Y H:i', 	strtotime($atividade->hora_fim)); ?>
							<td>{{$atividade->titulo}}</td>
							<td>{{$atividade->palestrante->nome}}</td>
							<td>{{$AtvIni}} Ás {{$AtvFim}}</td>

								@if($atividade->confirmacao == true)
									<td class="right aligned">Confirmada</td>
								@else
									<td class="right aligned">Não Confirmada</td>
								@endif
				@if($eventos->fim_evento > date('Y-m-d'))
					@can('update-evento', $eventos)
							<td>
								<a href="{{route('atividade.edit', $atividade->id)}}">
									<button class="ui green inverted button ">
										<i class="edit icon"></i>Editar Atividade
									</button>
								</a>
							</td>
							<td>
								<form method="POST" action="{{route('atividade.destroy', $atividade->id)}}">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="ui green inverted button" type="submit">
										<i class="delete icon"></i>Deletar Atividade
									</button>
									</a>
								</form>
							</td>
					@endcan
				@endif
						</tr>

						@endforeach
				@if($eventos->fim_evento > date('Y-m-d'))
					@can('update-evento', $eventos)
						<a href="{{route('atividade.create', $eventos->id)}}">
							<button class="ui green inverted button ">
								<i class="edit icon"></i>Criar Atividade
							</button>
						</a>	
						<a href="{{route('palestrante.create', $eventos->id)}}">
							<button class="ui green inverted button ">
								<i class="edit icon"></i>Adicionar Palestrante
							</button>
						</a>

					@endcan
				@endif
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
		@if($eventos->fim_evento > date('Y-m-d'))
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
	@endif
			</div>
		</div>
		<br>
				@can('update-evento', $eventos)
			<div class="ui segment">
				<center><span><h1>Editar ou Excluir Evento</h1></span><br>
	<!-- Pega a função de app\Providers\AuthServiceProvider.php
					 Caso esteja de acordo com o provider ele vai fazer aparecer o que está dentro-->

				<!-- O Usuario manager pode editar ou excluir qualquer evento -->
						<a href="{{route('evento.edit', $eventos->id)}}">
							<button class="ui green inverted button ">
								<i class="edit icon"></i>Editar Evento
							</button>
						</a>

						<form method="POST" action="{{route('evento.destroy', $eventos->id)}}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="ui green inverted button" type="submit">
								<i class="delete icon"></i>Deletar
							</button>
							</a>
						</form>
			</div>
				@endcan
@endsection