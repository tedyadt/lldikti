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
        Schema::create('aktas', function (Blueprint $table) {
            $table->id();
            $table->string('akta_nomor',45)->nullable(false)->default('not set');
            $table->date('akta_tgl')->nullable(false)->default('1000-01-01');
            $table->string('akta_nama_notaris',150)->nullable(false)->default('not set');
            $table->string('akta_kota_notaris',150)->nullable(false)->default('not set');
            $table->enum('akta_status', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->enum('akta_jenis', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->string('akta_dokumen', 100)->nullable(false)->default('not set');
            $table->string('nomor_akta',6)->nullable(false);
            $table->date('tgl_akta');
            $table->string('nama_akta',150);
            $table->string('kota_akta',150);
            $table->enum('status_akta', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->enum('jenis_akta', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->longText('dokumen_akta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktas');
    }
};
