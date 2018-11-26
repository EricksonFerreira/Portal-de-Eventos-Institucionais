@extends('layouts.app')

@section('content')
<?php 
	$campi = [
		'abreu' 	=> 'IFPE - CAMPUS - ABREU E LIMA',
		'afogados' 	=> 'IFPE - CAMPUS - AFOGADOS',
		'barreiros' => 'IFPE - CAMPUS - BARREIROS',
		'belojardim'=> 'IFPE - CAMPUS - BELO JARDIM',
		'igarassu' 	=> 'IFPE - CAMPUS - IGARASSU',
		'recife' 	=> 'IFPE - CAMPUS - RECIFE'
	];
?>
<br><br><br><br>
		<ol>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ol>
	<div class="ui container">
		<div class="ui segment">
			<div class="ui vertically divided grid">
				<div class="column">
					{{var_dump($eventos->campus)}}
					<form action="{{route('evento.update', $eventos->id)}}" class="ui form" id="cadastro" method="post" enctype="multipart/form-data">{{ csrf_field() }}{{method_field('PUT')}}
						<center>
							<h2 class="ui  header">Editar Evento</h2>
						</center>
						<br>
						<strong><h3 class="ui dividing header">Sobre o evento</h3></strong>
						<div class="field">
							<br><label>Nome*
								<input type="text" name="nome" placeholder="Nome do evento" value="{{old('nome',$eventos->nome ?? '')}}">
							</label>
							<div class="field">
								<br><label>Descrição*
									<textarea placeholder="Descrição do Evento" name="descricao" value="">{{old('descricao',$eventos->descricao ?? '')}}</textarea>
								</label>
							</div>
							<div class="three fields">
								<div class="field">
									<br><label>Email*
										<input type="text" name="email" placeholder="Email para contato"  value="{{ old('email',$eventos->email ?? '') }}">
									</label>
								</div>
								<div class="field">
									<br><label>Telefone*
										<input type="text" name="telefone" placeholder="Telefone para contato" value="{{ old('telefone',$eventos->telefone ?? '') }}">
									</label>
								</div>								
								<div class="field">
									<br><label>Vagas*
										<input type="number" name="vagas" value="{{ old('vagas',$eventos->vagas ?? '') }}">
									</label>
								</div>
								<div class="field">
									<br><br><label for="file" class="ui icon green inverted button"><i class="file image icon"></i> Adicionar-Imagem
										<input type="file" name="imagem" placeholder="Telefone para contato"   class="" value="img/evento/	{{ old('imagem',$evento->imagem ?? '') }}" style="display: none;" id="file" >
									</label>{{var_dump( old('imagem',$evento->imagem ?? ''))}}
								</div>
							</div>
							<br><strong><h3 class="ui dividing header">Data e hora do evento</h3></strong>
							<div class="five fields">
								<div class="field">
									<br><label>Inicio*
										<input type="date" name="inicio_evento" value="2018-11-15" placeholder="Data do evento" value="{{ old('inicio_evento',$evento->inicio_evento ?? '') }}">
									</label>
								</div>
								<div class="field">
									<br><label>Hora de Inicio*
										<input type="time" name="hora_inicio" value="{{ old('hora_inicio',$evento->hora_inicio ?? '') }}">
									</label>
								</div> 
								<div class="field">
									<input type="hidden" name="">
								</div>
								<div class="field">
									<br><label>Término*
										<input type="date" value="2018-11-15" name="fim_evento" value="{{ old('fim_evento',$evento->fim_evento ?? '') }}">
									</label>
								</div>
								<div class="field">
									<br><label>Hora de Finalização*
										<input type="time" name="hora_fim" value="{{ old('hora_fim',$evento->hora_fim ?? '') }}" >
									</label>
								</div>
							</div>
							<br><strong><h3 class="ui dividing header">Endereço do evento</h3></strong>
							<div class="field">
								<br><label>Campus do evento*</label>
								<select name="campus" class="ui fluid dropdown" value="{{ old('campus',$evento->campus ?? '') }}" >
						@foreach ($campi as $campusValue => $campusNome)
							<option value="{{$campusValue}}"	
							@if( isset($eventos) && $eventos->campus == $campusValue) 
								Select 
							@endif> 
							</option>
						@endforeach
								</select>
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
