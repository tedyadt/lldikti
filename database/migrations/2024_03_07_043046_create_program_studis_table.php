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
        Schema::create('program_studis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('program_studi_nama', 70)->nullable(false)->default('not set');
            $table->string('program_studi_jenjang', 10)->nullable(false)->default('not set');
            $table->string('program_studi_sk_penyelenggara', 200)->nullable(false)->default('not set');
            $table->date('program_studi_tgl_sk')->nullable(false)->default('1000-01-01');
            $table->date('program_studi_tgl_tutup')->nullable(false)->default('1000-01-01');
            $table->enum('program_studi_status', ['Aktif','Pembinaan','Alih Bentuk','Alih Kelola','Tutup', 'not set'])->default('not set');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studis');
    }
};
