<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use PDF;
use Illuminate\Http\Request;
use PDOException;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'kategori';
        $data['kategori'] = kategori::get();
        return view('kategori.index')->with($data);
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
    public function store(StorekategoriRequest $request)
    {
        kategori::create($request->all());
        return redirect('kategori')->with('success', 'Data kategori berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoriRequest $request, string $id)
    {
        $kategori = kategori::find($id)->update($request->all());
        return redirect('kategori')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        kategori::find($id)->delete();
        return redirect('kategori')->with('success', 'Data kategori berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new KategoriExport, $date . '_kategori.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new KategoriImport, $request->import);
        return redirect()->back()->with('success', 'Import data kategori berhasil');
    }

    public function generatepdf()
    {
        $kategori = kategori::all();
        $pdf = Pdf::loadView('kategori.table', compact('kategori'));
        return $pdf->download('kategori.pdf');
    }
}
