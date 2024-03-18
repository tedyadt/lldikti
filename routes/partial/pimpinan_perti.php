<?php

use App\Http\Controllers\PimpinanPertiController;
use Illuminate\Support\Facades\Route;

$main_url = 'pimpinan-perti';

Route::get('/'.$main_url.'/pimpinanpertibyidpertijson/{id_perti}', [PimpinanPertiController::class, 'pimpinanpertibyidpertijson']);
Route::resource($main_url, PimpinanPertiController::class)->names([
    'index' => $main_url,
    'store' =>  $main_url."store",
    
]);

