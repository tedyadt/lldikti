<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadanPenyelenggara extends Model
{
    use HasFactory;

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    
    public $fillable = [
        'bp_nama', 'bp_email', 'bp_telp', 'bp_alamat', 'id_user', 'bp_status', 'id', 'bp_logo'
    ];

}
