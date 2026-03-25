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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('codigo')->unique();  
            $table->string('email')->unique();
            $table->foreignId('carrera_id')->constrained('carreras');
            $table->foreignId('turno_id')->constrained('turnos');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }
};
