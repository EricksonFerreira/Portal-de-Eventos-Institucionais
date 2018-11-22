<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalestrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestrantes', function (Blueprint $table) {
            $table->increments('id');
            
            /* Chave Estrangeira do banco eventos*/
            $table->Integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos');

            /* Chave Estrangeira do banco users*/
            $table->Integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');


            $table->string('imagem')->nullable();
            $table->text('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('palestrantes');
    }
}
