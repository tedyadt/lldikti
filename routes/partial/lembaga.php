<?php

use App\Http\Controllers\LembagaController;
use Illuminate\Support\Facades\Route;

$main_url = 'lembaga';

Route::get('/'.$main_url.'/getlembagabyidjson/{id}', [LembagaController::class, 'getlembagabyidjson'])->name($main_url.'.getById');
Route::resource($main_url, LembagaController::class)->names([
    'index' => $main_url,
    'store' =>  $main_url."store",
]);

