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
            $table->string('mensaje');          
            $table->text('stack_trace')->nullable(); 
            $table->string('url')->nullable();   
            $table->string('metodo')->nullable(); 
            $table->integer('codigo_http')->nullable(); 
            $table->timestamps();
        });
    }
};
