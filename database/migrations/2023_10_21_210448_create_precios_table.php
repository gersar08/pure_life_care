<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    public function up()
    {

        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->string('producto_name');
            $table->decimal('precio_base', 6, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('precios');
    }
}
