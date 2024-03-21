<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Illuminate\Http\Request;
use PDOException;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'pelanggan';
        $data['pelanggan'] = pelanggan::get();
        return view('pelanggan.index')->with($data);
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
    public function store(StorepelangganRequest $request)
    {
        pelanggan::create($request->all());
        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, string $id)
    {
        $pelanggan = pelanggan::find($id)->update($request->all());
        return redirect('pelanggan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pelanggan::find($id)->delete();
        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date . '_pelanggan.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new PelangganImport, $request->import);
        return redirect()->back()->with('success', 'Import data jenis berhasil');
    }
}
