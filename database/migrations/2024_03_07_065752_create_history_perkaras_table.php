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
            $table->id();
            $table->date('tgl_hp_kejadian');
            $table->longText('diskripsi_hp');
            $table->longText('solusi_hp');
            $table->enum('status_hp', ['Aktif','Tidak Aktif','not set'])->default('not set');
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