@extends('layouts.app')

@section('content')
<br><br><br><br>
<table class="ui green table">
					<thead>
						<tr>
							<th>User_id</th>
							<th>Checking</th>
						</tr>
					</thead>
					<tbody>
						@foreach($participantes as $participante)
						<tr>
							<td>{{$participante->user_id}}</td>
							@if($participante->checking == 0)
								<td><a href="{{route('evento.checking', $participante->id)}}">{{$participante->checking}}</a></td>
							@else
								<td><a href="{{route('evento.checking', $participante->id)}}">{{$participante->checking}}</a></td>
							@endif
						</tr>

						@endforeach
@endsection