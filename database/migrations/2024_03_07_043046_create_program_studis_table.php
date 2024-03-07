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
            $table->id();
            $table->string('program_studi_nama', 70)->nullable(false);
            $table->string('program_studi_jenjag', 5)->nullable(false);
            $table->string('program_studi_sk_penyelenggara', 200)->nullable(false);
            $table->enum('program_studi_tgl_sk_date', ['Aktif','Pembinaan','Alih Bentuk','Alih Kelola','Tutup', 'not set'])->default('not set');
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
