<?php

use App\Exports\KategoriExport;
use App\Http\Controllers\absensiController;
use App\Http\Controllers\DetailTransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Imports\absensiImport;
use App\Models\absensi;

//login
Route::get("/login", [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Route untuk yang sudah login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index']);

    //admin
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/absensi', absensiController::class);
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/jenis', jenisController::class);
        Route::resource('/menu', menuController::class);
        Route::resource('/stok', StokController::class);
        Route::resource('/meja', MejaController::class);

        //export excell
        Route::get('export/absensi', [absensiController::class, 'exportData'])->name('export-absensi');
        Route::get('export/jenis', [jenisController::class, 'exportData'])->name('export-jenis');
        Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
        Route::get('export/menu', [menuController::class, 'exportData'])->name('export-menu');
        Route::get('export/stock', [StokController::class, 'exportData'])->name('export-stok');
        Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');

        //import excell
        Route::post('jenis/import', [jenisController::class, 'importData'])->name('import-jenis');
        Route::post('menu/import', [menuController::class, 'importData'])->name('import-menu');
        Route::post('stok/import', [StokController::class, 'importData'])->name('import-stok');
        Route::post('kategori/import', [KategoriController::class, 'importData'])->name('import-kategori');
        Route::post('meja/import', [MejaController::class, 'importData'])->name('import-meja');
        Route::post('absensi/import', [absensiController::class, 'importData'])->name('import-absensi');

        //export pdf
        Route::get('export/kategori/pdf', [KategoriController::class, 'generatepdf'])->name('export-kategori-pdf');
        Route::get('export/jenis/pdf', [jenisController::class, 'generatepdf'])->name('export-jenis-pdf');
        Route::get('export/absensi/pdf', [absensiController::class, 'generatepdf'])->name('export-absensi-pdf');
        Route::get('export/stok/pdf', [StokController::class, 'generatepdf'])->name('export-stok-pdf');
        Route::get('export/meja/pdf', [MejaController::class, 'generatepdf'])->name('export-meja-pdf');
        Route::get('export/menu/pdf', [menuController::class, 'generatepdf'])->name('export-menu-pdf');

    });

    //kasir
    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pemesanan', PemesananController::class);
        Route::resource('/transaksi', TransaksiController::class);
        Route::resource('/pelanggan', PelangganController::class);
        Route::resource('/produk_titipan', ProdukTitipanController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
        Route::get('export/pelanggan', [pelangganController::class, 'exportData'])->name('export-pelanggan');
        Route::post('pelanggan/import', [pelangganController::class, 'importData'])->name('import-pelanggan');
        Route::get('export/pelanggan/pdf', [pelangganController::class, 'generatepdf'])->name('export-pelanggan-pdf');
        // Route::get('export/produk_titipan', [ProdukTitipanController::class, 'exportData'])->name('export-produk_titipan');
        // Route::post('produk_titipan/import', [ProdukTitipanController::class, 'importData'])->name('import-produk_titipan');
        // Route::get('/produk_titipan/cetak_pdf', [ProdukTitipanController::class, 'cetak_pdf'])->name('export-produk_titipan');
    });

    //owner
    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        Route::resource('/laporan', DetailTransaksiController::class);
    });

    Route::get("/contact", [HomeController::class, 'contact']);
});
