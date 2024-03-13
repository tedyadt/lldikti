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
        Schema::create('bentuk_p_t_s', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('bentuk_perti_nama',100)->nullable(false)->default('not set');
=======
            $table->string('bentuk_nama',100);
>>>>>>> main
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bentuk_p_t_s');
    }
};
