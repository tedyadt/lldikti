<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadanPenyelenggara extends Model
{
    use HasFactory;

    public $fillable = [
        'bp_nama', 'bp_kontak', 'bp_alamat', 'id_user', 'bp_status'
    ];
}
