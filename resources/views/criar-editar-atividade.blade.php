@extends('layouts.app')

@section('content')
	<div class="ui container">
		<div class="ui segment">
			<div class="ui vertically divided grid">
				<div class="column">

					@isset($atividade)
						<form action="{{route('atividade.update', $atividade->id)}}" class="ui form" id="cadastro" method="post" enctype="multipart/form-data">{{ csrf_field() }}{{method_field('PUT')}}
					@else
					<?php $eventos = 8;?>
						<form action="{{route('atividade.store', $eventos)}}" class="ui form" id="cadastro" method="post">{{ csrf_field() }}
					@endisset
						<center>
							<h2 class="ui  header">Editar Atividade</h2>
						</center>
						<br>
						<strong><h3 class="ui dividing header">Sobre a Atividade</h3></strong>
						<div class="field">
							<br><label>Titulo*

								<input type="text" name="titulo" placeholder="Nome do evento" value="{{old('titulo',$atividade->titulo ?? '')}}" required>

							</label>
							<div class="field">
								<br><label>Descrição*
									<textarea placeholder="Descrição do Evento" name="descricao" value="" required>{{old('descricao',$atividade->descricao ?? '')}}</textarea>
								</label>
							</div>
							<label>Palestrante*
								<div class="ui search">
									<input class="prompt" type="text" name="palestrante" placeholder="Nome do palestrante ou usuário" value="{{old('titulo',$atividade->palestrante->nome ?? '')}}" required>
									<div class="results"></div>
								</div>
							</label>
								<div class="field">
									<br><label>Confirmação:
										<input type="checkbox" name="confirmacao"
											@if(isset($atividade) && $atividade->confirmacao == '1')
											 checked
											 @endif
										 >
									</label>
								</div>
							<br><strong><h3 class="ui dividing header">Data e hora da Atividade</h3></strong>
							<div class="five fields">

								<div class="field">
									<br><label>Hora de Inicio*
										<input type="datetime-local" name="hora_inicio" value="{{ old('hora_inicio',$atividade->hora_inicio ?? '') }}" min="{{$evento->inicio_evento}}T{{$evento->hora_inicio}}" max="{{$evento->fim_evento}}T{{$evento->hora_fim}}">
									</label>
								</div>
								<div class="field">
									<input type="hidden" name="">
								</div>
								<div class="field">
									<br><label>Hora de Finalização*
										<input type="datetime-local" name="hora_fim" value="{{ old('hora_fim',$atividade->hora_fim ?? '') }}" min="{{$evento->inicio_evento}}T{{$evento->hora_inicio}}" max="{{$evento->fim_evento}}T{{$evento->hora_fim}}">
									</label>
								</div>
							</div>
							<div class="ui dividing header"></div>
									<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
									@isset($evento)
										<input type="hidden" name="evento" value="{{$evento->id}}">
									@endisset
							<center><input type="submit" value="Cadastrar Evento" class="ui green inverted button submit"></center>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<script>
	$('.ui.search')
  .search({
    apiSettings: {
      // url: '//api.github.com/search/repositories?q={query}'
      url: "{{ route('palestrante.search', [$evento->id, '']) }}/{query}"
    },
    fields: {
      results : 'items',
      title   : 'nome'
      // url     : 'html_url'
    },
    minCharacters : 3
  })
;
//   console.log('oi');

</script>
@endsection
