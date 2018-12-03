<style>
	body{
		background-color: #ccc;
	}
</style>
<div class="ui tiny modal">
	<i class="close icon"></i>
	<div class="header">Adicionar Atividade</div>
	<div class="content">
		<form action="" class="ui form">
			<div class="field">
				<label for="titulo">Titulo da atividade *
					<input type="text" placeholder="Titulo aqui" name="titulo" id="titulo" required="">
				</label>
			</div>
			<div class="field">
				<label for="descricao">Descricao da atividade *
					<textarea type="text" placeholder="Descrição da atividade" name="titulo" name="descricao" id="descricao" required=""></textarea>
				</label>
			</div>
			<div class="field">
				<label for="palestrante">Palestrante *
					<input type="text" placeholder="Palestrante" name="palestrante" id="palestrante" required="">
				</label>
			</div>
			<div class="extra content">
				<h3>Data e hora da atividade</h3>
				<div class="two fields">
					<div class="field">
						<label>Hora de Inicio*
							<input type="datetime-local" name="hora_inicio" value=""><!-- min="2018-11-21T00:00:00" max="2019-11-22T06:00:00" -->
						</label>
					</div>
					<div class="field">
						<label>Hora de Finalização*
							<input type="datetime-local" name="hora_fim" value="" ><!-- min="2018-11-21T00:00:00" max="2019-11-22T06:00:00" -->
						</label>
					</div>
				</div>
			</div>
			<div class="ui equal width grid">
			<div class="column row">
				<div class="column"><button class="ui green submit fluid button"><i class="check icon"></i>Confirmar</button></div>
			</div>
		</div>
		</form>
	</div>
</div>
			
<script>
	$('#modal').click(function(){
		$('.modal').modal('show');
	})
</script>
