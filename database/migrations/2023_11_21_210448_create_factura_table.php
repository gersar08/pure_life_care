<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_id');
            $table->string('archivo_pdf')->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')->references('unique_id')->on('clientes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
