<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Models\User;
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

// Route::get('/', function () {


//     return view('admin.dashboard.index');
// });

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process_login'])->name('process.login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'process_register'])->name('process.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman admin (hanya akses jika sudah login dan level admin)
Route::middleware(['auth', 'admin'])->get('/admin', function () {
    $user = User::all();
    // count user role admin and pegawai
    $admin = User::where('role', 'admin')->count();
    $pegawai = User::where('role', 'pegawai')->count();
    return view('admin.dashboard.index', compact('user', 'admin', 'pegawai'));
    // return view('admin.dashboard.index'); // Sesuaikan dengan view dashboard admin Anda
})->name('admin_dashboard');

// Group rute untuk pegawai dengan prefix 'pegawai'
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/show/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
});



// Route::middleware(['auth', 'role:pegawai'])->group(function () {
//     Route::resource('pegawai', PegawaiController::class);
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {

// });
