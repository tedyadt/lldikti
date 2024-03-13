<?php

use App\Http\Controllers\BadanPenyelenggaraController;
use Illuminate\Support\Facades\Route;

$main_url = 'badan-penyelenggara';

Route::get('/'.$main_url.'/getbadanpenyelenggarabyidjson/{id}', [BadanPenyelenggaraController::class, 'getbadanpenyelenggarabyidjson'])->name($main_url.'.getById');
Route::get('/'.$main_url.'/badanpenyelenggarajson', [BadanPenyelenggaraController::class, 'badanpenyelenggarajson']);
Route::resource($main_url, BadanPenyelenggaraController::class)->names([
    'index' => $main_url,
    'store' =>  $main_url."store",
]);

