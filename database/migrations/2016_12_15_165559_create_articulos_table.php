<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->integer('modificador_usuario_id')->unsigned()->nullable();
            $table->string('titulo', 512)->nullable();
            $table->string('subtitulo', 512)->nullable();
            $table->string('url_alias', 512)->nullable();
            $table->string('redireccionar_url', 512)->nullable();
            $table->string('resumen', 512)->nullable();
            $table->string('imagen', 512)->nullable();
            $table->text('cuerpo')->nullable();
            $table->string('miniatura', 256)->nullable();
            $table->integer('orden')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('destacado')->nullable();
            $table->integer('visibilidad')->nullable();
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
        Schema::dropIfExists('articulos');
    }
}
