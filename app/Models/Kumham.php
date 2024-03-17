<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kumham extends Model
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
        'kumham_sk', 
        'kumham_tgl_sk',
        'kumham_waris', 
        'kumham_dokumen',
        'kumham_jenis',
        'fk_akta_guid', 
        'id_user'
    ];
}
