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
        Schema::create('facultades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');          // Ej: "Ingeniería de Sistemas"
            $table->string('codigo')->unique(); // Ej: "FIS" — no se puede repetir
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }
};
