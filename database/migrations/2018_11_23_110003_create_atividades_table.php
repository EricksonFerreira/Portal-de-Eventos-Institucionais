<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            /*dados da tabela eventos*/
            $table->increments('id');
            
            /* Chave Estrangeira do banco eventos*/            
            $table->Integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');

            /* Chave Estrangeira do banco eventos*/
            $table->Integer('palestraste_id')->unsigned();
            $table->foreign('palestraste_id')->references('id')->on('palestrantes')->onDelete('cascade');
            
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data');
            $table->time('hora_inicio');
            $table->time('hora_fim');
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
        Schema::dropIfExists('atividades');
    }
}
