@extends('layouts.app')

@section('content')
@php 
	$campi = [
		'abreu' => 'IFPE - CAMPUS - ABREU E LIMA',
		'afogados' => 'IFPE - CAMPUS - AFOGADOS',
		'barreiros' => 'IFPE - CAMPUS - BARREIROS',
		'belojardim' => 'IFPE - CAMPUS - BELO JARDIM',
		'igarassu' => 'IFPE - CAMPUS - IGARASSU',
		'recife' => 'IFPE - CAMPUS - RECIFE'
	];
	$data2 = date('Y-m-d');
	$dataHoje = $data2++;
@endphp
<br><br><br><br>
	<div class="ui container">
	@if ($errors->all())
		<div class="ui negative message">
			<i class="close icon"></i>
			<div class="header">
				Mensagens de Error
			</div>
			  <ul class="list">
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			  </ul>
		</div>
	@endif
		<div class="ui green segment">
			<div class="ui vertically divided grid">
				<div class="column">
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
									<textarea placeholder="Descrição do Evento" name="descricao">{{old('descricao',$eventos->descricao ?? '')}}</textarea>
								</label>
							</div>
							<div class="three fields">
								<div class="field">
									<br><label>Email*
										<input type="text" name="email" placeholder="Email para contato"  value="{{old('email',$eventos->email ?? '')}}">
									</label>
								</div>
								<div class="field">
									<br><label>Telefone
										<input type="text" id="telefone" name="telefone" placeholder="Telefone para contato" value="{{old('telefone',$eventos->telefone ?? '')}}">
									</label>
								</div>								
								<div class="field">
									<br><label>Vagas*
										<input type="number" name="vagas" min="0" max="300" value="{{old('vagas',$eventos->vagas ?? 0)}}">
									</label>
								</div>
								<div class="field">
									<br><br><label for="file" class="ui icon green button" style="color: white;"><i class="file image icon"></i> Adicionar-Imagem
										<input type="file" name="imagem" class="" value="{{old('imagem',$eventos->imagem ?? '')}}" style="display: none;" id="file" >
									</label>
								</div>
							</div>
							<br><strong><h3 class="ui dividing header">Data e hora do evento</h3></strong>
							<div class="five fields">
								<div class="field">
									<br><label>Inicio*

										<input type="date" name="inicio_evento" value="{{$dataHoje}}" placeholder="Data do evento">
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
										<input type="date" value="{{$data2}}" min="{{$data2}}" name="fim_evento" >
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
								<select name="campus" class="ui fluid dropdown" >
									@foreach ($campi as $campusValue => $campusNome)
										<option value="{{$campusValue}}"	
											@if( isset($eventos) && $eventos->campus == $campusValue) 
												Selected
											@endif> 
												{{ $campusNome }}
										</option>
									@endforeach
								</select>
							</div>
									<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<center><input type="submit" value="Cadastrar Evento" class="ui green button submit"></center>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>	
							<!-- Scripts para o Telefone -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script> -->
<script>

	$('.message .close')
	  .on('click', function() {
	    $(this)
	      .closest('.message')
	      .transition('fade')
	    ;
	  })
	;
//Telefone
jQuery("input#telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
</script>
@endsection
