<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloAccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_accions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modulo_id')->nullable();
            $table->integer('permiso_id')->nullable();
            $table->integer('usuario_id')->nullable();
            $table->string('alias', 256)->nullable();
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
        Schema::dropIfExists('modulo_accions');
    }
}
