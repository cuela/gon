<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taxonomia_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->string('nombre_usuario', 64)->nullable();
            $table->integer('modificador_usuario_id')->unsigned()->nullable();
            $table->string('modificador_nombre_usuario', 64)->nullable();
            $table->integer('cantidad_enfoque')->unsigned()->default(0);
            $table->integer('cantidad_favorito')->unsigned()->default(0);
            $table->integer('cantidad_visita')->unsigned()->default(0);
            $table->integer('cantidad_comentado')->unsigned()->default(0);
            $table->integer('cantidad_agregado')->unsigned()->default(0);
            $table->integer('cantidad_cuenta')->unsigned()->default(0);
            $table->integer('recomendar')->unsigned()->default(0);
            $table->integer('titular')->unsigned()->default(0);
            $table->integer('seguir')->unsigned()->default(0);
            $table->integer('bandera')->unsigned()->default(0);
            $table->integer('permitir_comentario')->unsigned()->default(0);
            $table->string('clave', 64)->nullable();
            $table->string('vista', 64)->nullable();
            $table->string('diseno', 64)->nullable();
            $table->integer('orden')->unsigned()->default(0);
            $table->integer('visibilidad')->unsigned()->default(0);
            $table->integer('estado')->unsigned()->default(0);
            $table->string('tipo_contenido', 64)->nullable();
            $table->string('seo_titulo', 512)->nullable();
            $table->string('seo_palabras_clave', 512)->nullable();
            $table->string('seo_descripcion', 512)->nullable();
            $table->string('titulo', 512)->nullable();
            $table->string('subtitulo', 512)->nullable();
            $table->string('url_alias', 512)->nullable();
            $table->string('redireccionar_url', 512)->nullable();
            $table->string('resumen', 512)->nullable();
            $table->string('imagen', 512)->nullable();
            $table->string('imagenes', 1024)->nullable();
            $table->string('categoria_id', 64)->nullable();
            $table->text('cuerpo')->nullable();
            $table->string('miniatura', 256)->nullable();
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
        Schema::dropIfExists('contenidos');
    }
}
