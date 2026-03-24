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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            // Esta línea crea la columna "facultad_id" Y la clave foránea en un solo paso:
            // - constrained('facultades') le dice: busca el id en la tabla facultades
            // - onDelete('cascade') significa: si borras la facultad, borra sus carreras
            $table->foreignId('facultad_id')->constrained('facultades')->onDelete('cascade');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }
};
