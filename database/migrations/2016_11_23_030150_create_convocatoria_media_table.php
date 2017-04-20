<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriaMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatoria_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convocatoria_id')->nullable();
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
        Schema::dropIfExists('convocatoria_media');
    }
}
