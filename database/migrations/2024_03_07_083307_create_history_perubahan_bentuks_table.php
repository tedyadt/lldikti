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
        Schema::create('history_perubahan_bentuks', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->date('hpb_tgl_perubahan')->nullable(false)->default('1000-01-01');
            $table->date('hpb_tgl_awal_bentuk_lama')->nullable(false)->default('1000-01-01');
            $table->date('hpb_tgl_akhiri_bentuk_lama')->nullable(false)->default('1000-01-01');
=======
            $table->date('hpb_tgl_perubahan');
            $table->date('hpb_tgl_awal_bentuk_lama');
            $table->date('hpb_tgl_akhiri_bentuk_lama');
>>>>>>> main
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_perubahan_bentuks');
    }
};
