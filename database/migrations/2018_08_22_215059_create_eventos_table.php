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
			$table->string('email');
			$table->string('site');
			$table->string('descricao');
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
