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
        Schema::create('history_kepemilikans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('hk_tgl_perubahan')->nullable(false)->default('1000-01-01');
            $table->longText('hk_keterangan')->nullable(false)->default('not set');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_kepemilikans');
    }
};
