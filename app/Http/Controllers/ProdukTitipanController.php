<?php

namespace App\Http\Controllers;

use App\Models\produk_titipan;
use App\Http\Requests\Storeproduk_titipanRequest;
use App\Http\Requests\Updateproduk_titipanRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\titipanProdukExport;
use App\Imports\titipanProdukImport;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'produk_titipan';
        $data['produk_titipan'] = produk_titipan::get();
        return view('produk_titipan.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeproduk_titipanRequest $request)
    {
        produk_titipan::create($request->all());
        return redirect('produk_titipan')->with('success', 'Data Produk Titipan berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk_titipan $produk_titipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk_titipan $produk_titipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateproduk_titipanRequest $request, string $id)
    {
        $produk_titipan = produk_titipan::find($id)->update($request->all());
        return redirect('produk_titipan')->with('success', 'Update data berhasil');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        produk_titipan::find($id)->delete();
        return redirect('produk_titipan')->with('success', 'Data berhasil dihapus!');

    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new titipanProdukExport, $date . '_titipan.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new titipanProdukImport, $request->import);
        return redirect()->back()->with('success', 'Import data jenis berhasil');
    }

    // public function cetak_pdf()
    // {
    //     // $produk_titipan = produk_titipan::all();

    //     // $pdf = PDF::loadview('produkTitipan_pdf', ['produk_titipan' => $produk_titipan]);
    //     // return $pdf->download('laporan-produk-pdf');

    //     $pdf = PDF::loadView('pdf');
    //     return $pdf->download('document.pdf');
    // }
}
