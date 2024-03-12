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
        Schema::create('akreditasi_pertis', function (Blueprint $table) {
            $table->id();
            $table->string('akeditasi_pt_sk', 45)->nullable(false)->default('not set');
            $table->date('akreditasi_pt_tgl_sk')->nullable(false)->default('1000-01-01');
            $table->date('akreditasi_pt_tgl_akhir')->nullable(false)->default('1000-01-01');
            $table->enum('akreditasi_pt_status', ['aktif', 'berakhir', 'not set'])->default('not set');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasi_pertis');
    }
};
