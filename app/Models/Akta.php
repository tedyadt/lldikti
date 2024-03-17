<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Akta extends Model
{
    use HasFactory;


    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }


    public $fillable = [
        'id',
        'akta_nomor', 'akta_tgl', 
        'akta_nama_notaris', 
        'akta_kota_notaris', 
        'akta_status', 
        'akta_jenis', 
        'akta_dokumen',
        'fk_bp_guid',
        'id_bp','id_user'
    ];

}
