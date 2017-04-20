<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFragmentoCodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fragmento_codigos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fragmento_id')->unsigned();
            $table->string('titulo', 256)->nullable();
            $table->text('contenido')->nullable();
            $table->string('creado_por', 256)->nullable();
            $table->integer('orden')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('fragmento_codigos');
    }
}
