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
            $table->unsignedBigInteger('fk_peringkat_id');
            $table->foreign('fk_peringkat_id')->references('id')->on('peringkat_akreditasis');

            $table->unsignedBigInteger('fk_lembaga_id');
            $table->foreign('fk_lembaga_id')->references('id')->on('lembagas');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');

            $table->foreignUuid('fk_program_studi_guid');
            $table->foreign('fk_program_studi_guid')->references('id')->on('program_studis');

        });

        Schema::table('program_studis', function(Blueprint $table){
            $table->foreignUuid('fk_perti_guid');
            $table->foreign('fk_perti_guid')->references('id')->on('perguruan_tinggis');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('perguruan_tinggis', function(Blueprint $table){
            $table->foreignUuid('fk_bp_guid');
            $table->foreign('fk_bp_guid')->references('id')->on('badan_penyelenggaras');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('akreditasi_pertis', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_peringkat_id');
            $table->foreign('fk_peringkat_id')->references('id')->on('peringkat_akreditasis');

            $table->foreignUuid('fk_perti_guid');
            $table->foreign('fk_perti_guid')->references('id')->on('perguruan_tinggis');

            $table->unsignedBigInteger('fk_lembaga_id');
            $table->foreign('fk_lembaga_id')->references('id')->on('lembagas');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('pimpinan_pertis', function (Blueprint $table) {
            $table->foreignUuid('fk_perti_guid');
            $table->foreign('fk_perti_guid')->references('id')->on('perguruan_tinggis');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');

            $table->foreignUuid('fk_jabatan_guid');
            $table->foreign('fk_jabatan_guid')->references('id')->on('jabatans');
        });

        Schema::table('history_perkaras', function (Blueprint $table) {
            $table->foreignUuid('fk_perti_guid');
            $table->foreign('fk_perti_guid')->references('id')->on('perguruan_tinggis');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('history_kepemilikans', function (Blueprint $table) {
            $table->foreignUuid('fk_perti_guid');
            $table->foreign('fk_perti_guid')->references('id')->on('perguruan_tinggis');

            $table->foreignUuid('bp_lama');
            $table->foreign('bp_lama')->references('id')->on('badan_penyelenggaras');

            $table->foreignUuid('bp_baru');
            $table->foreign('bp_baru')->references('id')->on('badan_penyelenggaras');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('kumhams', function (Blueprint $table) {
            $table->foreignUuid('fk_akta_guid');
            $table->foreign('fk_akta_guid')->references('id')->on('aktas');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('aktas', function (Blueprint $table) {
            $table->foreignUuid('fk_bp_guid');
            $table->foreign('fk_bp_guid')->references('id')->on('badan_penyelenggaras');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('penguruses', function (Blueprint $table) {
            $table->foreignUuid('fk_akta_guid');
            $table->foreign('fk_akta_guid')->references('id')->on('aktas');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('history_perkara_b_p_s', function (Blueprint $table) {
            $table->foreignUuid('fk_bp_guid');
            $table->foreign('fk_bp_guid')->references('id')->on('badan_penyelenggaras');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('history_perubahan_bentuks', function (Blueprint $table) {
            $table->foreignUuid('bentuk_sebelumnya');
            $table->foreign('bentuk_sebelumnya')->references('id')->on('bentuk_p_t_s');

            $table->foreignUuid('bentuk_baru');
            $table->foreign('bentuk_baru')->references('id')->on('bentuk_p_t_s');

            $table->foreignUuid('fk_perti_guid');
            $table->foreign('fk_perti_guid')->references('id')->on('perguruan_tinggis');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');

        });

        Schema::table('badan_penyelenggaras', function (Blueprint $table) {
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

        Schema::table('akreditasi_prodis', function (Blueprint $table){
            $table->dropForeign(['fk_peringkat_id']); 
            $table->dropColumn('fk_peringkat_id');

            $table->dropForeign(['fk_lembaga_id']); 
            $table->dropColumn('fk_lembaga_id');

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user');

            $table->dropForeign(['fk_program_studi_guid']); 
            $table->dropColumn('fk_program_studi_guid');

        });

        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropForeign(['fk_perti_guid']); 
            $table->dropColumn('ifk_perti_guid'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropForeign(['fk_bp_guid']); 
            $table->dropColumn('fk_bp_guid'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('akreditasi_pertis', function (Blueprint $table) {
            $table->dropForeign(['fk_peringkat_guid']); 
            $table->dropColumn('fk_peringkat_guid'); 

            $table->dropForeign(['fk_perti_guid']); 
            $table->dropColumn('fk_perti_guid'); 

            $table->dropForeign(['fk_perti_guid']); 
            $table->dropColumn('fk_perti_guid'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('history_perkaras', function (Blueprint $table) {
            $table->dropForeign(['fk_perti_guid']); 
            $table->dropColumn('fk_perti_guid');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('history_kepemilikans', function (Blueprint $table) {
            $table->dropForeign(['fk_perti_guid']); 
            $table->dropColumn('fk_perti_guid');

            $table->dropForeign(['bp_lama']); 
            $table->dropColumn('bp_lama');

            $table->dropForeign(['bp_baru']); 
            $table->dropColumn('bp_baru');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('kumhams', function (Blueprint $table) {
            $table->dropForeign(['fk_akta_guid']); 
            $table->dropColumn('fk_akta_guid');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('aktas', function (Blueprint $table) {
            $table->dropForeign(['fk_bp_guid']); 
            $table->dropColumn('fk_bp_guid');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('penguruses', function (Blueprint $table) {
            $table->dropForeign(['fk_akta_guid']); 
            $table->dropColumn('fk_akta_guid');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('history_perkara_b_p_s', function (Blueprint $table) {
            $table->dropForeign(['fk_bp_guid']); 
            $table->dropColumn('fk_bp_guid');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });

        Schema::table('history_perubahan_bentuks', function (Blueprint $table) {
            $table->dropForeign(['bentuk_sebelumnya']); 
            $table->dropColumn('bentuk_sebelumnya');
            
            $table->dropForeign(['bentuk_baru']); 
            $table->dropColumn('bentuk_baru'); 

            $table->dropForeign(['id_akreditasi_prodi']); 
            $table->dropColumn('id_akreditasi_prodi'); 

            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });
        
        Schema::table('pimpinan_pertis', function (Blueprint $table) {
            $table->dropForeign(['fk_perti_guid']); 
            $table->dropColumn('fk_perti_guid');
            
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 

            $table->dropForeign(['fk_jabatan_guid']); 
            $table->dropColumn('fk_jabatan_guid'); 
        });

        Schema::table('badan_penyelenggaras', function (Blueprint $table) {
            $table->dropForeign(['id_user']); 
            $table->dropColumn('id_user'); 
        });


    }
};
