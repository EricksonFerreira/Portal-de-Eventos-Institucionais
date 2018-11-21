<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('eventos', function (Blueprint $table) {
			/*dados da tabela eventos*/
			$table->increments('id');
			$table->Integer('user_id')->unsigned();
    		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('nome');
			$table->string('descricao');
			$table->enum('campus' , ['abreu', 'afogados', 'barreiros', 'belojardim', 'igarassu', 'recife']);
			$table->string('email');
			$table->string('telefone');
			$table->string('imagem');
			$table->Integer('vagas');
			$table->date('inicio_evento');
			$table->time('hora_inicio');
			$table->date('fim_evento');
			$table->time('hora_fim');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('eventos');
	}
}
