<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.dashboard.index');
});

Route::prefix('pegawai')->group(function() {
    Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/show/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
    Route::post('/', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
});

// Route::middleware(['auth', 'role:pegawai'])->group(function () {
//     Route::resource('pegawai', PegawaiController::class);
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {

// });
