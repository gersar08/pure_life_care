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
        Schema::create('RegistroVentasWeekly', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_id')->unique();
            $table->unsignedInteger('fardo');
            $table->unsignedInteger('garrafa');
            $table->unsignedInteger('pet');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('unique_id')->on('clientes');
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
