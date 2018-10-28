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
			$table->increments('id');
			$table->Integer('user_id')->unsigned();
    		$table->foreign('user_id')->references('id')->on('users')->onDelte('cascade');
			$table->string('nome');
			$table->string('descricao');
			$table->string('email')->unique();
			$table->string('telefone');
			$table->enum('role',['participante', 'monitor' , 'manager'])->default('participante');
			$table->string('imagem');
			$table->Integer('vagas');
			$table->date('inicio_evento');
			$table->date('fim_evento');
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
