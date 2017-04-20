<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraBoletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_boletins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boletin_id')->nullable();
            $table->string('nombre_completo', 256)->nullable();
            $table->string('pais_id',50)->nullable();
            $table->string('correo', 256)->nullable();
            $table->string('papeleta_bancaria', 256)->nullable();
            $table->integer('usuario_id')->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fecha_inicio_activacion')->nullable();
            $table->date('fecha_fin_activacion')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('vigente')->nullable();
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
        Schema::dropIfExists('compra_boletins');
    }
}
