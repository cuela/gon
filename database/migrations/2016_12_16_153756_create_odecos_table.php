<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 256)->nullable();
            $table->string('apellido_paterno', 256)->nullable();
            $table->string('apellido_materno', 256)->nullable();
            $table->string('carnet', 50)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('correo', 50)->nullable();
            $table->text('denuncia')->nullable();
            $table->integer('usuario_creador')->nullable();
            $table->integer('usuario_modificador')->nullable();
            $table->integer('orden')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('odecos');
    }
}
