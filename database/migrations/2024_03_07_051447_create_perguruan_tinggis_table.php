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
        Schema::create('perguruan_tinggis', function (Blueprint $table) {
            $table->id();
            $table->string('perti_nama', 150)->nullable(false)->default('not set');
            $table->string("perti_nama_singkat")->nullable(false);
            $table->string('perti_kota',45)->nullable(false);
            $table->enum('perti_status', ['Aktif','Pembinaan','Alih Bentuk','Alih Kelola','Tutup', 'not set'])->default('not set');
            $table->longText('perti_alamat')->nullable(false);
            $table->string('perti_email', 80)->nullable(false);
            $table->string('perti_telp', 45)->nullable(false);
            $table->string('perti_website', 45)->nullable(false);
            $table->string('perti_sk_pendirian', 45)->nullable(false);
            $table->date('perti_tgl_sk_pendirian')->nullable(false);
            $table->date('perti_tgl_tutup');
            $table->longText('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perguruan_tinggis');
    }
};
