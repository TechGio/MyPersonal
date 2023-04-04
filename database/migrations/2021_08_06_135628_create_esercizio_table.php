<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsercizioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esercizio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_scheda')->unsigned();
            $table->string('nome');
            $table->integer('serie');
            $table->integer('ripetizioni');
            $table->integer('recupero');
        });
        
        Schema::table('esercizio', function (Blueprint $table){
            $table->foreign('id_scheda')->references('id')->on('scheda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esercizio');
    }
}
