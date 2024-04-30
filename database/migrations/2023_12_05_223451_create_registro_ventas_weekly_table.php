<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registro_ventas_weekly', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_id')->unique();
            $table->unsignedInteger('fardo');
            $table->unsignedInteger('garrafa');
            $table->unsignedInteger('pet');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RegistroVentasWeekly');
    }
};
