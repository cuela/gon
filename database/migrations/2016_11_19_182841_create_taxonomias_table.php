<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('padre_id');
            $table->string('categoria_id', 64);
            $table->string('nombre', 64);
            $table->string('url_alias', 64)->nullable();
            $table->string('redirect_url', 128)->nullable();
            $table->string('imagen', 512)->nullable();
            $table->string('descripcion', 512)->nullable();
            $table->integer('pagina_tamanio')->nullable()->default(0);
            $table->string('seo_titulo', 512)->nullable();
            $table->string('seo_palabras_clave', 512)->nullable();
            $table->string('seo_descripcion', 512)->nullable();
            $table->string('contenidos')->nullable();
            $table->integer('orden')->nullable();
            $table->foreign('categoria_id')->references('id')->on('taxonomia_categorias');
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
        Schema::dropIfExists('taxonomias');
    }
}
