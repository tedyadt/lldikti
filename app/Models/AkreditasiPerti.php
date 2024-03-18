<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkreditasiPerti extends Model
{
    use HasFactory;

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }
    
    protected $fillable = [
        'akeditasi_pt_sk',
        'akreditasi_pt_tgl_sk',
        'akreditasi_pt_tgl_akhir',
        'akreditasi_pt_status',
        'fk_peringkat_id',
        'fk_perti_guid',
        'fk_lembaga_id',
        'id_user',
        'id'
    ];
}
