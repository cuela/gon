<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 256)->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fecha_publicacion')->nullable();
            $table->string('archivo', 1500)->nullable();
            $table->string('imagen', 500)->nullable();
            $table->string('miniatura', 500)->nullable();
            $table->integer('usuario_creador')->nullable();
            $table->integer('orden')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('visibilidad')->nullable();
            $table->integer('categoria_boletin_id')->nullable();

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
        Schema::dropIfExists('boletins');
    }
}
