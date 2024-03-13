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
        Schema::create('peringkat_akreditasis', function (Blueprint $table) {
            $table->id();
            $table->string('peringkat_nama', 45)->default('not set');
            $table->string('peringkat_logo', 100)->default('not set');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peringkat_akreditasis');
    }
};
