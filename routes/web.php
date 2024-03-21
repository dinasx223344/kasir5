<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;


//login
Route::get("/login", [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Route untuk yang sudah login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index']);

    //admin
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/jenis', jenisController::class);
        Route::resource('/menu', menuController::class);
        Route::resource('/stok', StokController::class);
        Route::resource('/pelanggan', PelangganController::class);
        Route::resource('/meja', MejaController::class);
        Route::get('export/jenis', [jenisController::class, 'exportData'])->name('export-jenis');
        Route::get('export/menu', [menuController::class, 'exportData'])->name('export-menu');
        Route::get('export/stock', [StokController::class, 'exportData'])->name('export-stok');
        // Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');
        Route::get('export/pelanggan', [pelangganController::class, 'exportData'])->name('export-pelanggan');
        Route::post('jenis/import', [jenisController::class, 'importData'])->name('import-jenis');
        Route::post('menu/import', [menuController::class, 'importData'])->name('import-menu');
        Route::post('stok/import', [StokController::class, 'importData'])->name('import-stok');
        Route::post('pelanggan/import', [pelangganController::class, 'importData'])->name('import-pelanggan');
    });

    //kasir
    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pemesanan', PemesananController::class);
        Route::resource('/transaksi', TransaksiController::class);
        Route::resource('/produk_titipan', ProdukTitipanController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
        Route::get('export/produk_titipan', [ProdukTitipanController::class, 'exportData'])->name('export-produk_titipan');
        Route::post('produk_titipan/import', [ProdukTitipanController::class, 'importData'])->name('import-produk_titipan');
        // Route::get('/produk_titipan/cetak_pdf', [ProdukTitipanController::class, 'cetak_pdf'])->name('export-produk_titipan');
    });

    Route::get("/about", [HomeController::class, 'about']);
});
