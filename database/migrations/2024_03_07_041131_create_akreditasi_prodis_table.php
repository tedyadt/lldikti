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
        Schema::create('akreditasi_prodis', function (Blueprint $table) {
            $table->id();
            $table->string('akreditasi_prodi_sk', 200)->nullable(false);
            $table->date('akreditasi_prodi_tgl_sk')->default(null);
            $table->date('akreditasi_prodi_tgl_akhir')->default(null);
            $table->enum('akreditasi_prodi_status', ['Aktif', 'Berakhir', 'not set'])->default('not set')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasi_prodis');
    }
};
