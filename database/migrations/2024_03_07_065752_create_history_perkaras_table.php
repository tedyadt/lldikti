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
        Schema::create('history_perkaras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('hp_tgl_kejadian')->nullable(false)->default('1000-01-01');
            $table->longText('hp_diskripsi')->nullable(false)->default('not set');
            $table->longText('hp_solusi')->nullable(false)->default('not set');
            $table->enum('hp_status', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_perkaras');
    }
};
