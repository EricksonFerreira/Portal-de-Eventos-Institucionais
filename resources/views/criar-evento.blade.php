@extends('layouts.app')

@section('content')
<?php 
	$campi = [
		'abreu' => 'IFPE - CAMPUS - ABREU E LIMA',
		'afogados' => 'IFPE - CAMPUS - AFOGADOS',
		'barreiros' => 'IFPE - CAMPUS - BARREIROS',
		'belojardim' => 'IFPE - CAMPUS - BELO JARDIM',
		'igarassu' => 'IFPE - CAMPUS - IGARASSU',
		'recife' => 'IFPE - CAMPUS - RECIFE'
	];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Criar Evento</title>
</head>
<body>
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
					<form action="{{route('evento.store')}}" class="ui form" id="cadastro" method="post" enctype="multipart/form-data">
						<center>
							<h2 class="ui  header">Cadastro do Evento</h2>
						</center>
						<br>
						<strong><h3 class="ui dividing header">Sobre o evento</h3></strong>
						<div class="field">
							<br><label>Nome*
								<input type="text" name="nome" placeholder="Nome do evento" value="{{old('nome')}}" >
							</label>
							<div class="field">
								<br><label>Descrição*
									<textarea placeholder="Descrição do Evento" name="descricao">{{old('descricao')}}</textarea>
								</label>
							</div>
							<div class="three fields">
								<div class="field">
									<br><label>Email*
										<input type="text" name="email" placeholder="Email para contato"  value="{{old('email')}}">
									</label>
								</div>
								<div class="field">
									<br><label>Telefone*
										<input type="text" name="telefone" placeholder="Telefone para contato" value="{{old('telefone')}}">
									</label>
								</div>								
								<div class="field">
									<br><label>Vagas*
										<input type="number" name="vagas" value="{{old('vagas')}}">
									</label>
								</div>
								<div class="field">
									<br><br><label for="file" class="ui icon green inverted button"><i class="file image icon"></i> Adicionar-Imagem
										<input type="file" name="imagem" placeholder="Telefone para contato"   class="" value="{{old('imagem')}}" style="display: none;" id="file" >
									</label>
								</div>
							</div>
							<br><strong><h3 class="ui dividing header">Data e hora do evento</h3></strong>
							<div class="five fields">
								<div class="field">
									<br><label>Inicio*
										<input type="date" name="inicio_evento" value="2018-11-21" placeholder="Data do evento">
									</label>
								</div>
								<div class="field">
									<br><label>Hora de Inicio*
										<input type="time" name="hora_inicio" value="00:00"  >
									</label>
								</div> 
								<div class="field">
									<input type="hidden" name="">
								</div>
								<div class="field">
									<br><label>Término*
										<input type="date" value="2018-11-22" name="fim_evento" >
									</label>
								</div>
								<div class="field">
									<br><label>Hora de Finalização*
										<input type="time" name="hora_fim" value="06:00" >
									</label>
								</div>
							</div>
							<br><strong><h3 class="ui dividing header">Endereço do evento</h3></strong>
							<div class="field">
								<br><label>Campus do evento*</label>
								<select name="campus" class="ui fluid dropdown" value="Escolha um campus"   >
									<option value=""></option>
									<!-- <option value="abreu">IFPE - CAMPUS - ABREU E LIMA</option>
									<option value="afogados">IFPE - CAMPUS - AFOGADOS</option>
									<option value="barreiros">IFPE - CAMPUS - BARREIROS</option>
									<option value="belojardim">IFPE - CAMPUS - BELO JARDIM</option>
									<option value="igarassu">IFPE - CAMPUS - IGARASSU</option>
									<option value="recife">IFPE - CAMPUS - RECIFE</option> -->
									<?php foreach ($campi as $campusValue => $campusNome): ?>
										<option value="<?= $campusValue ?>" <?= old('campus') == $campusValue ? 'selected' : '' ?>><?= $campusNome ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="ui dividing header"></div>
									<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
	
</body>
</html>