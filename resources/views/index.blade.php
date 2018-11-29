@extends('layouts.app')

@section('content')

<div class="ui container">
	 <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info', 'update'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
  <div class="ui three column grid">


<!-- Condição para saber se existe a variavel que lista -->
  @if (empty($eventos))
  	<!-- Se não existir aparece essa mensagem -->
          <br><h3 class="a">A variavel não exite!<br>Corija esse erro com urgência</h3>
        @else
        <?php date_default_timezone_set("America/Recife");
setlocale(LC_ALL, 'pt_BR');
?>
		<!-- Se ela existir vai aparecer isso-->
		@can('criar-evento')
			<div class="column">
				<div class="ui segment">
					<center>
						<a href="{{route('evento.create')}}">
							<button class="ui basic medium button">
								<h1 class="ui green header">Novo Evento<br>
									<center><i class="plus large icon"></i></center>
								</h1>
							</button>
						</a>
					</center>
				</div>
			</div>
		@endcan
		<!-- Listar todos os atributos dos itens já cadastrados na tabela-->
		<center><div style="width: 100%;">
		@foreach($eventos as  $evento)

			@component('card-evento', ['evento' => $evento, 'past' => false])
			@endcomponent

		@endforeach
		@foreach($past as  $evento)

			@component('card-evento', ['evento' => $evento, 'past' => true])
			@endcomponent

		@endforeach
   @endif
</div></center>

</body>
</html>
@endsection