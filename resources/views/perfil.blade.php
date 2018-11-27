@extends('layouts.app')

@section('content')
	<div class="ui container">
		<div class="ui segment">
			<div class="ui vertically divided grid">
				<div class="column">

						<form action="{{route('atividade.update', $atividade->id)}}" class="ui form" id="cadastro" method="post" enctype="multipart/form-data">
						<center>
							<h2 class="ui  header">Perfil/h2>
						</center>
						<br>
						<strong><h3 class="ui dividing header">Sobre a Atividade</h3></strong>
						<div class="field">
							<br><label>Titulo*
								<input type="text" name="name" placeholder="Nome do Usuário" value="{{old('name',$atividade->name ?? '')}}" required>
							</label>
							<div class="field">
								<br><label>Email*
									<input type="email"	placeholder="Email do Usuário" name="email" value="" required>{{old('email',$atividade->email ?? '')}}>
								</label>
							</div>							
								<div class="field">
									<br><label>Senha:
										<input type="password" name="password" placeholder="Digite a sua senha">
									</label>
								</div>
							<br><strong><h3 class="ui dividing header">Data e hora da Atividade</h3></strong>
							<div class="five fields">

								<div class="field">
									<br><label>Hora de Inicio*
										<input type="time" name="hora_inicio" value="{{ old('hora_inicio',$atividade->hora_inicio ?? '08:00') }}">
									</label>
								</div> 
								<div class="field">
									<input type="hidden" name="">
								</div>
								<div class="field">
									<br><label>Hora de Finalização*
										<input type="time" name="hora_fim" value="{{ old('hora_fim',$atividade->hora_fim ?? '17:30') }}" >
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
<script src="{{ asset('js/search.min.js') }}"></script>
<script>
// 	$('.ui.search')
//   .search({
//     apiSettings: {
//       url: '//api.github.com/search/repositories?q={query}'
//     },
//     fields: {
//       results : 'items',
//       title   : 'name',
//       url     : 'html_url'
//     },
//     minCharacters : 3
//   })
// ;
//   console.log('oi');

</script>
@endsection