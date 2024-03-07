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
        //events
        // Schema::table('nama_table', function (Blueprint $table) {
        //     $table->tipe_data('nama_kolom', length);
        
        //     $table->foreign('nama_kolom')->references('kolom_tabel_asal')->on('tabel_asal');
        // });

        Schema::table('role_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_permission');
    
            $table->foreign('id_role')->references('id')->on('roles');
            $table->foreign('id_permission')->references('id')->on('permissions');
        });

        Schema::table('akreditasi_prodis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_peringkat_akreditasi');
            $table->foreign('id_peringkat_akreditasi')->references('id')->on('peringkat_akreditasis');

            $table->unsignedBigInteger('id_lembaga');
            $table->foreign('id_lembaga')->references('id')->on('lembagas');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');

            $table->unsignedBigInteger('id_program_studi');
            $table->foreign('id_program_studi')->references('id')->on('program_studis');

        });

        Schema::table('program_studis', function(Blueprint $table){
            $table->unsignedBigInteger('id_perti');
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('perguruan_tinggis', function(Blueprint $table){
            $table->unsignedBigInteger('id_bp');
            $table->foreign('id_bp')->references('id')->on('badan_penyelenggaras');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('akreditasi_pertis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_peringkat_akreditasi');
            $table->foreign('id_peringkat_akreditasi')->references('id')->on('peringkat_akreditasis');

            $table->unsignedBigInteger('id_perti');
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis');

            $table->unsignedBigInteger('id_lembaga');
            $table->foreign('id_lembaga')->references('id')->on('lembagas');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // //contoh
        // Schema::table('nama_table', function (Blueprint $table) {
        //     $table->dropForeign(['nama_kolom']); 
        //     $table->dropColumn('nama_kolom'); 
        // });

        Schema::table('role_permissions', function (Blueprint $table) {
            $table->dropForeign(['id_role']); 
            $table->dropColumn('id_role');

            $table->dropForeign(['id_permission']); 
            $table->dropColumn('id_permission'); 
        });

        Schema::table('akreditasi_prodis', function (Blueprint $table){
            $table->dropForeign(['id_peringkat_akreditasi']); 
            $table->dropColumn('id_peringkat_akreditasi');

            $table->dropForeign(['id_lembaga']); 
            $table->dropColumn('id_lembaga');

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user');

            $table->dropForeign(['id_program_studi']); 
            $table->dropColumn('id_program_studi');

        });

        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropForeign(['id_perti']); 
            $table->dropColumn('id_perti'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropForeign(['id_bp']); 
            $table->dropColumn('id_bp'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('akreditasi_pertis', function (Blueprint $table) {
            $table->dropForeign(['id_peringkat_akreditasi']); 
            $table->dropColumn('id_peringkat_akreditasi'); 

            $table->dropForeign(['id_perti']); 
            $table->dropColumn('id_perti'); 

            $table->dropForeign(['id_perti']); 
            $table->dropColumn('id_perti'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });
    }
};
