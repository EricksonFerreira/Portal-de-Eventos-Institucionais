@extends('layouts.app')

@section('content')<div class="ui container">
		<div class="ui segment">
			<div class="ui vertically divided grid">
				<div class="column">
					{{var_dump($atividade->campus)}}
					<form action="{{route('atividade.store', $atividade->id)}}" class="ui form" id="cadastro" method="post" enctype="multipart/form-data">{{ csrf_field() }}{{method_field('PUT')}}
						<center>
							<h2 class="ui  header">Editar Evento</h2>
						</center>
						<br>
						<strong><h3 class="ui dividing header">Sobre o evento</h3></strong>
						<div class="field">
							<br><label>Titulo*
								<input type="text" name="titulo" placeholder="Nome do evento" value="{{old('titulo',$atividade->titulo ?? '')}}">
							</label>
							<div class="field">
								<br><label>Descrição*
									<textarea placeholder="Descrição do Evento" name="descricao" value="">{{old('descricao',$atividade->descricao ?? '')}}</textarea>
								</label>
							</div>							
								<div class="field">
									<br><label>Confirmação*
										<input type="boolean" name="vagas" value="{{ old('vagas',$atividade->vagas ?? '') }}">
									</label>
								</div>
							<br><strong><h3 class="ui dividing header">Data e hora da Atividade</h3></strong>
							<div class="five fields">

								<div class="field">
									<br><label>Hora de Inicio*
										<input type="time" name="hora_inicio" value="{{ old('hora_inicio',$atividade->hora_inicio ?? '') }}">
									</label>
								</div> 
								<div class="field">
									<input type="hidden" name="">
								</div>
								<div class="field">
									<br><label>Hora de Finalização*
										<input type="time" name="hora_fim" value="{{ old('hora_fim',$atividade->hora_fim ?? '') }}" >
									</label>
								</div>
							</div>
							<div class="ui dividing header"></div>
									<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
							<center><input type="submit" value="Cadastrar Evento" class="ui green inverted button submit"></center>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>	
@endsection