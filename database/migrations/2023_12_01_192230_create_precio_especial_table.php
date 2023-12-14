<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecioEspecialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precio_especial', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('product_name')->unique();
            $table->decimal('precio_especial', 8, 2);
            $table->timestamps();

            $table->foreign('client_id')->references('unique_id')->on('clientes');
            $table->foreign('product_name')->references('producto_name')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precio_especial');
    }
}
