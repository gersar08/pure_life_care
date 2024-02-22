<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique()->index()->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('telefono');
            $table->string('direccion');
            $table->string('n_documento')->unique();
            $table->string('departamento');
            $table->string('municipio');
            $table->string('registro_num');
            $table->string('giro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
