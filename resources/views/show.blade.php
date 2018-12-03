@extends('layouts.app')

@section('css')
<link href="{{ asset('css/evento.css') }}" rel="stylesheet">
@endsection

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

?>

<!-- Palestrante Evento -->
<div class="ui vertical masthead center aligned segment">
	<br><br><br><br><br>
	<div class="div3">	
		<h1 class="span">{{ucwords(strtolower($eventos->nome))}}</h1>
		@if($iniDt == $fimDt)
		<h2 class="opacity">{{$iniDt}} - {{$HrIni}} às {{$HrFim}}</h2>
		@else
		<h2 class="opacity">{{$iniDt}} - {{$HrIni}} às {{$fimDt}} - {{$HrFim}}</h2>
		@endif
		<h2 class="opacity">Campus {{ucwords(strtolower($eventos->campus))}} - IFPE </h2>
		<h2 class="opacity">{{ucwords(strtolower($eventos->campus))}}</h2>
	</div>
</div>
<div class="ui container">
	<div class="position">		
		<div class="ui segment">
			<center><span><h1>Palestrantes do evento</h1></span></center>
			<div class="ui list">
				<center>
				@foreach($atividades as $atividadea)
					<div class="item">
						<img class="ui avatar tiny image" src="/img/icone/ifpe.png">
						<div class="content">
							<h2>{{$atividadea->palestrante->nome}}</h2>
							<div class="description" style="width: 50%">{{$atividadea->palestrante->descricao}}<b></div>
							<div class="ui divider"></div>
						</div>
					</div>
					@endforeach
				</center>
			</div>
		</div>

	<!-- Programação Evento -->

	<div class="ui segment">
		<center><span><h1>Programação do evento</h1></span></center>
		<!-- <div class="ui green divider"></div> -->
		<table class="ui single line table">
			<thead>
				<tr>
					<th>Palestra</th>
					<th>Palestrante</th>
					<th>Horário</th>
					<th>Status</th>
					@if($eventos->fim_evento > date('Y-m-d'))
					@can('update-evento', $eventos)
					<th class="center aligned">Ações</th>
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
					<td>Confirmada</td>
					@else
					<td>Não Confirmada</td>
					@endif
					@if($eventos->fim_evento > date('Y-m-d'))
					@can('update-evento', $eventos)
					<td class="right aligned">
						<div class="ui mini buttons">
							<a href="{{route('atividade.edit', $atividade->id)}}">
								<button class="ui positive button">
									<i class="edit icon"></i>Editar
								</button>
							</a>
							<div class="or"></div>
								<form method="POST" action="{{route('atividade.destroy', $atividade->id)}}">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="ui negative button">
										<i class="close icon"></i> Excluir
									</button>
						</div>
					</td>	
						@endcan
					@endif
				</tr>
					@endforeach

					<!-- Criar Atividade -->

		<!-- 					@if($eventos->fim_evento > date('Y-m-d'))
								@can('update-evento', $eventos)
									<a href="{{route('atividade.create', $eventos->id)}}">
										<button class="ui green inverted button ">
											<i class="edit icon"></i>Criar Atividade
										</button>
									</a>	
								-->
								<!-- Adicionar Palestrante						 -->

<!-- 									<a href="{{route('palestrante.create', $eventos->id)}}">
										<button class="ui green inverted button ">
											<i class="edit icon"></i>Adicionar Palestrante
										</button>
									</a>
								-->
								<!-- Gerencia do Evento -->

									<!-- <a href="{{route('evento.gerenciaEvento', $eventos->id)}}">
										<button class="ui green inverted button ">
											<i class="edit icon"></i>Gerência do Evento
										</button>
									</a>
								@endcan
								@endif -->

			</tbody>
		</table>
	</div>

					<!-- Descricao -->

					<div class="ui segment">
						<center><span><h1>Descrição do evento</h1></span></center>
						<div class="ui green divider"></div>
						<div class="justify">
								<p>{{$eventos->descricao}}</p>
						</div>
					</div>

						<!-- Inscricao -->

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
						
							<!-- Acoes -->

			@can('update-evento', $eventos)
			<div class="ui segment">
				<center><span><h1>Ações</h1></span></center>
				<br>
				<div class="ui green divider"></div>
				<br>
					<div class="ui equal width grid">
						<div class="four wide row modal-actions">
							<div class="column">
								<a href="" class="ui green tiny fluid button" data-target="add-atividade">
									<i class="plus icon"></i>Adicionar atividades
								</a>
							</div>
							<div class="column">
									<a href="{{route('palestrante.create', $eventos->id)}}" class="ui green tiny fluid button">
										<i class="user icon plus"></i>Adicionar Palestrante
									</a>
							</div>
							<div class="column">
									<a href="{{route('evento.gerenciaEvento', $eventos->id)}}" class="ui green tiny fluid button">
										<i class="user icon"></i>Gerenciar Participantes
									</a>
							</div>
							<div class="column">
									<a href="{{route('evento.edit', $eventos->id)}}" class="ui green tiny fluid button">
										<i class="edit icon"></i>Editar Evento
									</a>
							</div>
							<div class="column">
									<a href="">
										<form method="POST" action="{{route('evento.destroy', $eventos->id)}}">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button class="ui green tiny fluid button" type="submit">
												<i class="delete icon"></i>Excluir evento
											</button>
										</a>
									</form>
								</div>
							</div>
						</div>
					</div>
			@component('modal-adicionar-atividade', ['evento' => $eventos])
			@endcomponent
		<script>
			$('.modal-actions a').click(function(e){
				var modal_target = $(e.target).attr('data-target');
				if (modal_target) {
					e.preventDefault();
					$('#' + modal_target).modal('show');
				}
			})
		</script>

	@endcan
@endsection