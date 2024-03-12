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

        Schema::table('akreditasi_prodis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_peringkat_akreditasi')->nullable();
            $table->foreign('id_peringkat_akreditasi')->references('id')->on('peringkat_akreditasis')->nullable();

            $table->unsignedBigInteger('id_lembaga')->nullable();
            $table->foreign('id_lembaga')->references('id')->on('lembagas')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();

            $table->unsignedBigInteger('id_program_studi')->nullable();
            $table->foreign('id_program_studi')->references('id')->on('program_studis')->nullable();

        });

        Schema::table('program_studis', function(Blueprint $table){
            $table->unsignedBigInteger('id_perti')->nullable();
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });

        Schema::table('perguruan_tinggis', function(Blueprint $table){
            $table->unsignedBigInteger('id_bp')->nullable();
            $table->foreign('id_bp')->references('id')->on('badan_penyelenggaras')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });

        Schema::table('akreditasi_pertis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_peringkat_akreditasi')->nullable();
            $table->foreign('id_peringkat_akreditasi')->references('id')->on('peringkat_akreditasis')->nullable();

            $table->unsignedBigInteger('id_perti')->nullable();
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis')->nullable();

            $table->unsignedBigInteger('id_lembaga')->nullable();
            $table->foreign('id_lembaga')->references('id')->on('lembagas')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });

        Schema::table('pimpinan_pertis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_perti')->nullable();
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();

            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->nullable();
        });

        Schema::table('history_perkaras', function (Blueprint $table) {
            $table->unsignedBigInteger('id_perti')->nullable();
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });

        Schema::table('history_kepemilikans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_perti')->nullable();
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis')->nullable();

            $table->unsignedBigInteger('bp_lama')->nullable();
            $table->foreign('bp_lama')->references('id')->on('badan_penyelenggaras')->nullable();

            $table->unsignedBigInteger('bp_baru')->nullable();
            $table->foreign('bp_baru')->references('id')->on('badan_penyelenggaras')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });

        Schema::table('kumhams', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akta')->nullable();
            $table->foreign('id_akta')->references('id')->on('aktas')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });

        Schema::table('aktas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bp')->nullable();
            $table->foreign('id_bp')->references('id')->on('badan_penyelenggaras')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });
        Schema::table('penguruses', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akta')->nullable();
            $table->foreign('id_akta')->references('id')->on('aktas')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });
        Schema::table('history_perkara_b_p_s', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bp')->nullable();
            $table->foreign('id_bp')->references('id')->on('badan_penyelenggaras')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
        });
        Schema::table('history_perubahan_bentuks', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bentuk_sebelumnya')->nullable();
            $table->foreign('id_bentuk_sebelumnya')->references('id')->on('bentuk_p_t_s')->nullable();

            $table->unsignedBigInteger('id_bentuk_baru')->nullable();
            $table->foreign('id_bentuk_baru')->references('id')->on('bentuk_p_t_s')->nullable();

            $table->unsignedBigInteger('id_perti')->nullable();
            $table->foreign('id_perti')->references('id')->on('perguruan_tinggis')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();

        });

        Schema::table('badan_penyelenggaras', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();

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
        
        Schema::table('pimpinan_pertis', function (Blueprint $table) {
            $table->dropForeign(['id_perti']); 
            $table->dropColumn('id_perti');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 

            $table->dropForeign(['id_jabatan']); 
            $table->dropColumn('id_jabatan'); 
        });

        Schema::table('history_perkaras', function (Blueprint $table) {
            $table->dropForeign(['id_perti']); 
            $table->dropColumn('id_perti');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('history_kepemilikans', function (Blueprint $table) {
            $table->dropForeign(['id_perti']); 
            $table->dropColumn('id_perti');

            $table->dropForeign(['bp_lama']); 
            $table->dropColumn('bp_lama');

            $table->dropForeign(['bp_baru']); 
            $table->dropColumn('bp_baru');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('kumhams', function (Blueprint $table) {
            $table->dropForeign(['id_akta']); 
            $table->dropColumn('id_akta');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('aktas', function (Blueprint $table) {
            $table->dropForeign(['id_bp']); 
            $table->dropColumn('id_bp');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('penguruses', function (Blueprint $table) {
            $table->dropForeign(['id_akta']); 
            $table->dropColumn('id_akta');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('history_perkara_b_p_s', function (Blueprint $table) {
            $table->dropForeign(['id_bp']); 
            $table->dropColumn('id_bp');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('history_perubahan_bentuks', function (Blueprint $table) {
            $table->dropForeign(['id_bentuk_sebelumnya']); 
            $table->dropColumn('id_bentuk_sebelumnya');
            
            $table->dropForeign(['id_bentuk_baru']); 
            $table->dropColumn('id_bentuk_baru'); 

            $table->dropForeign(['id_akreditasi_prodi']); 
            $table->dropColumn('id_akreditasi_prodi'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('badan_penyelenggaras', function (Blueprint $table) {
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });


    }
};
