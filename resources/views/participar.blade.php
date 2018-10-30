@extends('layouts.app')

@section('content')
	<a href="{{route('evento.index')}}">Voltar a Index</a>

						<div>Id 		: {{$evento->id}}</div>
						<div>evento_id 	: {{$evento->evento_id}}</div>
						<div>user_id 	: {{$evento->user_id}}</div>
						<div>checking	: {{$evento->checking}}</div>
@endsection