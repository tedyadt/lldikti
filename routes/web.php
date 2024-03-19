<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, "authenticate"])->name('login');
Route::get('/logout', [LoginController::class, "unauthenticate"])->name('logout');


Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    require __DIR__.'/partial/badan_penyelenggara.php';
    require __DIR__.'/partial/perguruan_tinggi.php';
    require __DIR__.'/partial/lembaga_akreditasi.php';
    require __DIR__.'/partial/peringkat_akreditasi.php';
    require __DIR__.'/partial/role.php';
    require __DIR__.'/partial/user.php';
    require __DIR__.'/partial/pimpinan_perti.php';
    require __DIR__.'/partial/jabatan.php';




});




