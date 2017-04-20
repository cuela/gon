<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFragmentoEstaticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fragmento_estaticos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fragmento_id')->unsigned();
            $table->string('titulo', 256)->nullable();
            $table->string('titulo_formato', 60)->nullable();
            $table->string('imagen', 256)->nullable();
            $table->string('miniatura', 256)->nullable();
            $table->string('url', 256)->nullable();
            $table->string('subtitulo', 256)->nullable();
            $table->string('resumen', 512)->nullable();
            $table->integer('orden')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('destacado')->nullable();
            $table->foreign('fragmento_id')->references('id')->on('fragmentos');
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
        Schema::dropIfExists('fragmento_estaticos');
    }
}
