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
        Schema::create('badan_penyelenggaras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('bp_nama',45)->nullable(false)->default('not set');
            $table->string('bp_email', 100)->nullable(false)->default('not set');
            $table->string('bp_telp', 20)->nullable(false)->default('not set');
            $table->string('bp_alamat', 200)->nullable(false)->default('not set');
            $table->string('bp_logo', 200)->nullable(false)->default('not set');
            $table->enum('bp_status', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badan_penyelenggaras');
    }
};
