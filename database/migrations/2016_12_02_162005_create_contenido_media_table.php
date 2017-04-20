<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contenido_id')->nullable();
            $table->integer('media_id')->nullable();
            $table->string('titulo', 256)->nullable();
            $table->string('resumen', 512)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenido_media');
    }
}
