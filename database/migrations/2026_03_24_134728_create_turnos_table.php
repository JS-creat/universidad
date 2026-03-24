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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();              // Crea columna "id" autoincremental (PRIMARY KEY)
            $table->string('nombre'); // Columna texto: "Mañana", "Tarde", "Noche"
            $table->boolean('activo')->default(true); // true/false, por defecto activo
            $table->timestamps();      // Crea created_at y updated_at automáticamente
        });
    }
};
