<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasificadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasificadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 256)->nullable();
            $table->string('descripcion', 500)->nullable();
            $table->integer('estado')->nullable();
            $table->integer('orden')->nullable();
            $table->string('grupo', 50)->nullable();
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
        Schema::dropIfExists('clasificadors');
    }
}
