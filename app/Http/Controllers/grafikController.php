<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Models\menu;
use App\Models\stok;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;

class grafikController extends Controller
{
    public function index(){
    $menu = menu::get();
    $data['count_menu'] = $menu->count();

    $pelanggan = pelanggan::get();
    $data['count_pelanggan'] = $pelanggan->count();

    $transaksi = detailTransaksi::get();
    $data['count_transaksi'] = $transaksi->count();

    //tampilkan 5 data pelanggan 
    $data['pelanggan'] = pelanggan::limit(5)->orderBy('created_at', 'desc')->get();

    //tampilkan 5 Top penjualan 
    $data['detailTransaksi'] = detailTransaksi::limit(5)->orderBy('created_at', 'desc')->get();

    //sisa stok 
    $data['stok'] = stok::limit(5)->orderBy('jumlah', 'asc')->get();

    //transaksi 
    $data['transaksi'] = detailTransaksi::limit(5)->orderBy('created_at', 'desc')->get();

    //pendapatan
    $transaksi = transaksi::get();
    $data['pendapatan'] = $transaksi->sum('total_harga');

    return view('grafik')->with($data);
    
    }
}
