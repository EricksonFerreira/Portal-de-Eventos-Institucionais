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
								<input type="text" name="palestrante" placeholder="Nome do evento" value="{{old('titulo',$atividade->titulo ?? '')}}" required>
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
									<input type="hidden" name="evento" value="{{$evento}}">
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