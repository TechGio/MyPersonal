<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_utente')->unsigned();
            $table->string('nome');
        });
        
        Schema::table('scheda', function (Blueprint $table){
            $table->foreign('id_utente')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheda');
    }
}
