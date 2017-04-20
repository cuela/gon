<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 256)->nullable();
            $table->string('telefono', 256)->nullable();
            $table->string('correo', 256)->nullable();
            $table->string('empresa', 256)->nullable();
            $table->string('pais_id',50)->nullable();
            $table->string('asunto',50)->nullable();
            $table->text('solicitud')->nullable();
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
        Schema::dropIfExists('contactos');
    }
}
