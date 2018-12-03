	<div class="ui vertical masthead center aligned segment">
			<br><br><br><br><br>
			<div class="div3">	
				<h1 class="span">{{ucwords(strtolower($eventos->nome))}}</h1>
				<@if($iniDt == $fimDt)
			<h2 class="opacity">{{$iniDt}} - {{$HrIni}} às {{$HrFim}}</h2>
		@else
			<h2 class="opacity">{{$iniDt}} - {{$HrIni}} às {{$fimDt}} - {{$HrFim}}</h2>
		@endif
				<h2 class="opacity">Campus {{ucwords(strtolower($eventos->campus))}} - IFPE </h2>
				<h2 class="opacity">{{ucwords(strtolower($eventos->campus))}}</h2>
			</div>
	</div>