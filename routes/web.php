<?php

use App\Http\Controllers\bahanbakuController;
use App\Http\Controllers\BahanbakuinController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\baranginController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangmasukController as ControllersBarangmasukController;
use App\Http\Controllers\BarangoutController;
use App\Http\Controllers\deskripsibarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\userController;
use App\Http\Middleware\CheckRole;
use App\Models\bahanbaku;
use App\Models\bahanbakuin;
use App\Models\barangin;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\kategori;
use App\Models\Satuan;
use App\Models\barang;
use App\Models\barangout;
use App\Models\deskripsibarang;
use App\Models\Supplier;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    });
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'autenticate']);
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/store', [LoginController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'title' => 'Inventory | Dashboard',
            'barang' => barang::all(),
            'bahan' => bahanbaku::all(),
            'supplier' => Supplier::all(),
            'barangin' => barangin::all(),
            'barangout' => barangout::all()
        ]);
    });
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['iniAdminOrStaf'])->group(function () {

    Route::resource('/kategori', KategoriController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/barang', barangController::class);
    Route::resource('/deskripsibarang', deskripsibarangController::class);
    Route::get('/getDeskripsi/{kode_barang}', [deskripsibarangController::class, 'getDeskripsi']);
    Route::get('/deskripsibarang/add/{kode_barang}', [deskripsibarangController::class, 'add']);
    Route::get('/deskripsibarang/{deskripsibarang:kode_barang}/edit', [deskripsibarangController::class, 'edit']);
    Route::put('/deskripsibarang/{deskripsibarang:kode_barang}', [deskripsibarangController::class, 'update']);
    Route::delete('/deskripsibarang/{deskripsibarang:kode_barang}', [deskripsibarangController::class, 'destroy']);

    Route::resource('/barangin', baranginController::class);
    Route::get('/getNamaBarang/{kode_barang}', [baranginController::class, 'getNamaBarang']);

    Route::resource('/barangout', BarangoutController::class);
    Route::get('/getNamaBarang/{kode_barang}', [barangoutController::class, 'getNamaBarang']);

    // bahan baku 
    Route::resource('/bahanbaku', bahanbakuController::class);
    Route::resource('/bahanbakuin', BahanbakuinController::class);
    Route::get('/getNamaBahan/{id}', [bahanbakuinController::class, 'getNamaBahan']);
});

Route::middleware(['iniAdminOrPemilik'])->group(function () {
    // laporan 
    Route::get('/laporan.cetakbahanin', [laporanController::class, 'cetakbahanin']);
    Route::get('/laporan/cetakbahaninpdf/{start_date}/{end_date}', [laporanController::class, 'cetakbahaninpdf']);

    Route::get('/laporan.cetakin', [laporanController::class, 'cetakin']);
    Route::get('/laporan/cetakinpdf/{tglawal}/{tglakhir}', [laporanController::class, 'cetakinpdf']);

    Route::get('/laporan.cetakout', [laporanController::class, 'cetakout']);
    Route::get('/laporan/cetakoutpdf/{tglawal}/{tglakhir}', [laporanController::class, 'cetakoutpdf']);
});

Route::resource('/user', userController::class)->middleware('auth');
Route::put('/user/{id}/update-role', [userController::class, 'updateRole'])->name('user.updateRole')->middleware('iniAdmin');
