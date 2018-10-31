<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticiparEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
    
        Schema::create('participar_eventos', function (Blueprint $table) {
           /*O identificador do registro*/
            $table->increments('id');
           
            /* Chave Estrangeira do banco eventos*/
            $table->Integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')
            ->onUpdated('cascade')
            ->onDelete('cascade');

            /* Chave Estrangeira do banco users*/
            $table->Integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdated('cascade')
            ->onDelete('cascade');

            /* booleano para saber se o cara está no evento*/            
            $table->boolean('checking');

            $table->unique('evento_id', 'user_id');
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
        Schema::dropIfExists('participar_eventos');
    }
}
