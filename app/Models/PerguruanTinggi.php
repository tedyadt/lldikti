<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerguruanTinggi extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'id_bp',
        'perti_logo',
    ];
}