<?php

use App\Http\Controllers\LembagaController;
use Illuminate\Support\Facades\Route;

$main_url = 'lembaga-akreditasi';

Route::get('/'.$main_url.'/getlembagaakreditasibyidjson/{id}', [LembagaController::class, 'getlembagaakreditasibyidjson'])->name($main_url.'.getById');
Route::get('/'.$main_url.'/lembagaakreditasijson', [LembagaController::class, 'lembagaakreditasijson']);
Route::resource($main_url, LembagaController::class)->names([
    'index' => $main_url,
    'store' =>  $main_url."store",
]);

