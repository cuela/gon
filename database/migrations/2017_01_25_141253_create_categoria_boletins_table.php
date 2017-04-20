<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaBoletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_boletins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 256)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('padre_id')->nullable();
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
        Schema::dropIfExists('categoria_boletins');
    }
}
