<div class="ui tiny modal" id="add-atividade">
	<i class="close icon"></i>
	<div class="header">Adicionar Atividade</div>
	<div class="content">
		<form action="{{route('atividade.store', $evento)}}" class="ui form" id="cadastro" method="post">{{ csrf_field() }}
			<div class="field">
				<label for="titulo">Titulo da atividade *
					<input type="text" name="titulo" placeholder="Nome do evento" value="{{old('titulo',$atividade->titulo ?? '')}}" required>
				</label>
			</div>
			<div class="field">
				<label for="descricao">Descricao da atividade *
					<textarea placeholder="Descrição do Evento" name="descricao" value="" required>{{old('descricao',$atividade->descricao ?? '')}}</textarea>
				</label>
			</div>
			<div class="field">
				<label for="palestrante">Palestrante *
					<div class="ui search">
						<input class="prompt" type="text" name="palestrante" placeholder="Nome do palestrante ou usuário" value="{{old('titulo',$atividade->palestrante->nome ?? '')}}" required>
						<div class="results"></div>
						<input type="hidden" id="palestrante_id" name="palestrante_id" value="{{ old('palestrante_id', $atividade->palestrante_id ?? '') }}">
					</div>
				</label>
			</div>
			<div class="field">
				<br><label>Palestrante Confirmado :
					<input type="checkbox" name="confirmacao"
						@if(isset($atividade) && $atividade->confirmacao == '1')
						 checked
						 @endif
					 >
				</label>
			</div>
			<div class="extra content">
				<h3>Data e hora da atividade</h3>
				<div class="two fields">
					<div class="field">
						<label>Hora de Inicio*
							<input type="datetime-local" name="hora_inicio" value="{{ old('hora_inicio',$atividade->hora_inicio ?? '') }}" min="{{$evento->inicio_evento}}T{{$evento->hora_inicio}}" max="{{$evento->fim_evento}}T{{$evento->hora_fim}}" required="">
						</label>
					</div>
					<div class="field">
						<label>Hora de Finalização*
							<input type="datetime-local" name="hora_fim" value="{{ old('hora_fim',$atividade->hora_fim ?? '') }}" min="{{$evento->inicio_evento}}T{{$evento->hora_inicio}}" max="{{$evento->fim_evento}}T{{$evento->hora_fim}}" required="">
						</label>
					</div>
				</div>
			</div>
			<div class="ui equal width grid">
			<div class="column row">
				<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
			@isset($evento)
				<input type="hidden" name="evento" value="{{$evento->id}}">
			@endisset
				<div class="column"><button class="ui green submit fluid button"><i class="check icon"></i>Confirmar</button></div>
			</div>
		</div>
		</form>
	</div>
</div>
<script>
$('.ui.search .prompt').on('change', function() {
	$('#palestrante_id').val('');
})
	$('.ui.search')
  .search({
    apiSettings: {
      // url: '//api.github.com/search/repositories?q={query}'
      url: "{{ route('palestrante.search', [$evento->id, '']) }}/{query}"
    },
    fields: {
      results : 'items',
      title   : 'nome'
    },
    minCharacters : 3,
    onSelect: function(part) {
    	$('#palestrante_id').val(part['id']);
    }
  })
;
//   console.log('oi');

</script>
