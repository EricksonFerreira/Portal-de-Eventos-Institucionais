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
    public function up()
    {
        Schema::create('participar_eventos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->Integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')
            ->onUpdated('cascade')
            ->onDelete('cascade');


            $table->Integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdated('cascade')
            ->onDelete('cascade');
            
            $table->boolean('checking');
            

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
