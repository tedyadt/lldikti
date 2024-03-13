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
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('pengurus_nama',69)->nullable(false)->default('not set');
            $table->string('pengurus_jabatan',100)->nullable(false)->default('not set');
            $table->longText('pengurus_keterangan')->nullable(false)->default('not set');
            $table->date('pengurus_periode_mulai')->nullable(false)->default('1000-01-01');
            $table->date('pengurus_periode_akhir')->nullable(false)->default('1000-01-01');
=======
            $table->string('pengurus_nama',69);
            $table->string('pengurus_jabatan',100);
            $table->longText('pengurus_keterangan');
            $table->date('pengurus_periode_mulai');
            $table->date('pengurus_periode_akhir');
>>>>>>> main
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
