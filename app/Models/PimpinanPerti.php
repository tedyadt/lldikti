<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PimpinanPerti extends Model
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
        'pimpinan_nama',
        'fk_jabatan_guid'
        
    ];

}
