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
        Schema::create('kumhams', function (Blueprint $table) {
            $table->id();
            $table->string('sk_kumham',30)->nullable(false);
            $table->date('tgl_sk_kumham');
            $table->string('jenis_kumham',250);
            $table->longText('dokumen_kumham');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kumhams');
    }
};
