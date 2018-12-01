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
<div class="ui container">
	<div class="position">
		<div class="ui segment">
			<center><span><h1>Gerenciamento do Evento</h1></span></center>
			<table class="ui green table">
				<thead>
					<tr>
						<th>Nome do Participante</th>
						<th>Checking</th>
						<th>Role</th>
					</tr>
				</thead>
				<tbody>
					@if(sizeof($participantes) > 0)
						@foreach($participantes as $participante)
							<tr>
								<td>{{$participante->gerencia->name}}</td>
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
								</td>
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