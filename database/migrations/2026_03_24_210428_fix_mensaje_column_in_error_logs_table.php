<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixMensajeColumnInErrorLogsTable extends Migration
{
    public function up(): void
    {
        Schema::table('error_logs', function (Blueprint $table) {
            $table->text('mensaje')->change();
        });
    }

    public function down(): void
    {
        Schema::table('error_logs', function (Blueprint $table) {
            $table->string('mensaje')->change();
        });
    }
}
