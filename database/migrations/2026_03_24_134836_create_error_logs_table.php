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
        Schema::create('error_logs', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje');           // Texto del error
            $table->text('stack_trace')->nullable(); // El rastro completo (puede ser nulo)
            $table->string('url')->nullable();   // Qué URL causó el error
            $table->string('metodo')->nullable(); // GET, POST, etc.
            $table->integer('codigo_http')->nullable(); // 500, 404, etc.
            $table->timestamps();
        });
    }
};
