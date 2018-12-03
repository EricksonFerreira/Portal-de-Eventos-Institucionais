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

		<!-- Listar todos os atributos dos itens já cadastrados na tabela-->
		<center><div style="width: 100%;">
		<div class="ui container" style="margin-top: 100px;padding: 0px 0px 0px 110px;">
			<div class="ui link cards" >
				@foreach($eventos as  $evento)
					@component('card-evento', ['evento' => $evento, 'past' => false])
					@endcomponent

				@endforeach
			</div>
		</div>
		<div class="ui container" style="margin-top: 100px;padding: 0px 0px 0px 110px;">
			<div class="ui link cards" >
				@foreach($past as  $evento)

					@component('card-evento', ['evento' => $evento, 'past' => true])
					@endcomponent

				@endforeach
   		</div>
   	</div>
   @endif
</div></center>

</body>
</html>
@endsection