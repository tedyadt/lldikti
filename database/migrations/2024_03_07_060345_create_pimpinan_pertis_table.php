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
            $table->uuid('id')->primary();
            $table->string('pimpinan_nama',100)->nullable(false)->default('not set');
            $table->string('pimpinan_telp',45)->nullable(false)->default('not set');
            $table->string('pimpinan_email',100)->nullable(false)->default('not set');
            $table->date('pimpinan_tgl_awal')->nullable(false)->default('1000-01-01');
            $table->date('pimpinan_tgl_akhir')->nullable(false)->default('1000-01-01');
            $table->string('pimpinan_sk',45)->nullable(false)->default('not set');
            $table->enum('pimpinan_status', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->longText('pimpinan_foto')->nullable()->default('not set');
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
