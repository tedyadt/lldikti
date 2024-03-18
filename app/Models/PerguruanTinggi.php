<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerguruanTinggi extends Model
{
    use HasFactory;

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }


    protected $fillable = [
        'id',
        'perti_nama',
        'perti_nama_singkat',
        'perti_sk_pendirian',
        'perti_tgl_sk_pendirian',
        'perti_kota',
        'perti_alamat',
        'perti_email',
        'perti_telp',
        'perti_telp',
        'perti_status',
        'keterangan',
        'fk_bp_guid',
        'fk_lembaga_id',
        'perti_logo',
        'perti_guid',
        'perti_kode',
        'id_user',
        'perti_website'
        
    ];
}
