@extends('layouts.app')

@section('content')
<br><br><br><br>	
	<div class="ui container">
		<div class="ui green segment">
			<div class="ui vertically divided grid">
				<div class="column">

					@isset($palestrante)
						<form action="{{route('palestrante.update', $palestrante->id)}}" class="ui form" id="cadastro" method="post" enctype="multipart/form-data">{{ csrf_field() }}{{method_field('PUT')}}
					@else
						<form action="{{route('palestrante.store', $evento)}}" class="ui form" id="cadastro" method="post" enctype="multipart/form-data">{{ csrf_field() }}
					@endisset
						<center>
						@isset($palestrante)
								<h2 class="ui  header">Editar Palestrante</h2>
						@else
								<h2 class="ui  header">Criar Palestrante</h2>
						@endisset
						</center>
						<br>
						<strong><h3 class="ui dividing header">Sobre a Palestrante</h3></strong>
						<div class="field">
							<br><label>Titulo*
								<input type="text" name="nome" placeholder="Nome do palestrante" value="{{old('nome',$palestrante->nome ?? '')}}" required>
							</label>
							<div class="field">
								<br><label>Descrição*
									<textarea placeholder="Descrição do Palestrante" name="descricao" value="">{{old('descricao',$palestrante->descricao ?? '')}}</textarea>
								</label>
							</div>
								<div style="width: 20%">
									<div class="field">
										<label for="file" class="ui icon green button" style="color: white;"><i class="file image icon"></i> Adicionar-Imagem
											<input type="file" name="imagem" class="" value="{{old('imagem',$palestrante->imagem ?? '')}}" style="display: none;" id="file" >
										</label>
									</div>
								</div>
							
									<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
									@isset($evento)
										<input type="hidden" name="evento" value="{{$evento->id}}">
									@endisset
							<center>
								@isset($palestrante)
									<input type="submit" value="Editar Palestrante" class="ui green inverted button submit">
								@else
									<input type="submit" value="Cadastrar Palestrante" class="ui green inverted button submit">
								@endisset
							</center>

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