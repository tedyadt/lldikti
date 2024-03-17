<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function encrypt($date, $length) {
        // Enkripsi tanggal menggunakan Base64
        $encryptedDate = hash('sha256', $date);

        // Ambil 5 karakter pertama sebagai bagian dari nama file
        $encryptedDate = substr($encryptedDate, 0, $length);
    
        return $encryptedDate;
    }

    function generateFilename($ext, $fileName, $uniqueID) {
        $tanggal = now()->format('YmdHisv');
        $encryptedDate = $this->encrypt($tanggal, 5);
        $encryptedId = $this->encrypt($uniqueID, 3);
    
        // Ganti spasi kosong dengan karakter _
        $fileName = str_replace(' ', '_', $fileName);
    
        // Buat nama file dengan format yang diinginkan
        $newFilename = "{$fileName}_{$encryptedId}_{$encryptedDate}.{$ext}";
    
        return $newFilename;
    }
}
