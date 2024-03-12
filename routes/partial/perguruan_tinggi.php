<?php

use App\Http\Controllers\PerguruanTinggiController;
use Illuminate\Support\Facades\Route;

$main_url = 'perguruan-tinggi';

Route::get($main_url.'/perguruantinggijson', [PerguruanTinggiController::class, 'perguruantinggijson']);
Route::resource($main_url, PerguruanTinggiController::class)->names([
    'index' => $main_url,
]);

