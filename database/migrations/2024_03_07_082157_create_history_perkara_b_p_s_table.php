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
        Schema::create('history_perkara_b_p_s', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->date('hpbp_tgl_kejadian')->nullable(false)->default('1000-01-01');
            $table->longText('hpbp_deskripsi')->nullable(false)->default('not set');
            $table->longText('hpbp_solusi')->nullable(false)->default('not set');
=======
            $table->date('hpbp_tgl_kejadian');
            $table->longText('hpbp_deskripsi');
            $table->longText('hpbp_solusi');
>>>>>>> main
            $table->enum('status', ['Aktif','Tidak Aktif','not set'])->default('not set');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_perkara_b_p_s');
    }
};
