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
            $table->id();
            $table->string('bp_nama',45)->nullable(false);
            $table->longText('bp_alamat');
            $table->enum('bp_status', ['Aktif','Tidak Aktif']);
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
