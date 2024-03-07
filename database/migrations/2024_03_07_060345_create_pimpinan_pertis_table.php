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
        Schema::create('pimpinan_pertis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pimpinan',100)->nullable(false);
            $table->string('telp_pimpinan',45);
            $table->string('email_pimpinan',100);
            $table->string('jabatan_pimpinan',100);
            $table->date('tgl_awal_pimpinan');
            $table->date('tgl_akhir_pimpinan');
            $table->string('sk_pimpinan',45);
            $table->enum('status_pimpinan', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->longText('foto_pimpinan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pimpinan_pertis');
    }
};
