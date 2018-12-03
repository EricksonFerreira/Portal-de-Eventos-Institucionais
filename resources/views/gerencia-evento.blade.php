@extends('layouts.app')

@section('content')
<?php 
	$role = [
		'participante' 	=> 'Participante',
		'monitor' 	=> 'Monitor',
		'manager' => 'Manager',
	];
?>
<br><br><br><br>
<div id="container" style="margin-top: 100px;">
	<div id="body">
		<div class="ui container tabela">
			<div class="ui green segment">
				<center><h1 class="ue green header">Gerenciamento do Evento</h1></center>
			</div>
			<table class="ui table" style="width: 100%;padding: 30px;border-radius: 20px;">
					<tr>
						<thead>
								<th>Nome do Participante</th>
								<th>CPF</th>
								<th>Cargo</th>
								<th class="right aligned">Ações</th>
						</thead>
					</tr>
				<tbody>
					@if(sizeof($participantes) > 0)
						@foreach($participantes as $participante)
							<tr>
								<td>{{$participante->gerencia->name}}</td>
								<td>{{$participante->gerencia->cpf}}</td>
								<td>
									<select name="role" id="filtro" class="ui fluid dropdown" onchange="this.form.submit()">
										@foreach ($role as $roleValue => $roleNome)
											<option value="{{$roleValue}}"
												@if(isset($partipante) && $participante->role == $roleValue)
													Selected
												@endif>
												{{$roleNome}}
											</option>
										@endforeach	
									</select>
								</td>
								@if($participante->checking == 0)
									<td class="right aligned">
										<a href="{{route('evento.checking', $participante->id)}}" class="ui red button"><i class="delete icon"></i>Não está</a>
									</td>
								@else
									<td class="right aligned">
										<a href="{{route('evento.checking', $participante->id)}}" class="ui green button"><i class="check icon"></i>Ele está</a>
									</td>
								@endif
								
									<!-- Checking  -->

								<!-- <td>{{$participante->checking}}</td>
										@if($participante->checking == 0)
											<td><a href="{{route('evento.checking', $participante->id)}}">{{$participante->checking}}</a></td>
										@else
											<td><a href="{{route('evento.checking', $participante->id)}}">{{$participante->checking}}</a></td>
										@endif
								<td>
									<select name="role" id="filtro" class="ui fluid dropdown" onchange="this.form.submit()">
										@foreach ($role as $roleValue => $roleNome)
											<option value="{{$roleValue}}"
												@if(isset($partipante) && $participante->role == $roleNome)
													Selected
												@endif>
												{{$roleNome}}
											</option>
										@endforeach	
									</select>
								</td> -->
						
							</tr>
						@endforeach
					@else
						<tr>
							<td>Não há Participantes no momento</td>
						</tr>
					@endif
				</tbody>
			</table>
			<script type="text/javascript">
				document.getElementById('filtro').addEventListener('change', function() {
    this.form.submit();
});
			</script>
		</div>
	</div>
</div>

@endsection