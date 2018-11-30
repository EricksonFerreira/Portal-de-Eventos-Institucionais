@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="ui container">
	<div class="position">
		<div class="ui segment">
			<center><span><h1>Gerenciamento do Evento</h1></span></center>
			<table class="ui green table">
				<thead>
					<tr>
						<th>User_id</th>
						<th>Checking</th>
					</tr>
				</thead>
				<tbody>
					@if($participantes)
						@foreach($participantes as $participante)
							<tr>
								<td>{{$participante->user->name}}</td>
								@if($participante->checking == 0)
									<td><a href="{{route('evento.checking', $participante->id)}}">{{$participante->checking}}</a></td>
								@else
									<td><a href="{{route('evento.checking', $participante->id)}}">{{$participante->checking}}</a></td>
								@endif
							</tr>
						@endforeach
					@else
						<tr>
							<td>Não há Participantes no momento</td>
						</tr>
					@endisset
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection