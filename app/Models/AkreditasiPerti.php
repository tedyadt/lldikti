<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkreditasiPerti extends Model
{
    use HasFactory;

    protected $fillable = [
        'akeditasi_pt_sk',
        'akreditasi_pt_tgl_sk',
        'akreditasi_pt_tgl_akhir',
        'akreditasi_pt_status',
        'id_peringkat_akreditasi ',
        'id_perti',
        'id_lembaga',
        'id_user '
    ];
}
