<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('padre_id');
            $table->string('menu_categoria_id', 64);
            $table->string('nombre', 64);
            $table->string('url', 512)->nullable();
            $table->string('destino', 64)->nullable();
            $table->string('descripcion', 512)->nullable();
            $table->string('imagen', 512)->nullable();
            $table->smallInteger('estado')->nullable();
            $table->integer('orden')->nullable();

            $table->foreign('menu_categoria_id')->references('id')->on('menu_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
