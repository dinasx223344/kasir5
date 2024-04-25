<?php

namespace App\Http\Controllers;

use App\Exports\MejaExport;
use App\Models\meja;
use App\Http\Requests\StoremejaRequest;
use App\Http\Requests\UpdatemejaRequest;
use App\Imports\KategoriImport;
use App\Imports\MejaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'meja';
        $data['meja'] = meja::get();
        return view('meja.index')->with($data);
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
    public function store(StoremejaRequest $request)
    {
        meja::create($request->all());
        return redirect('meja')->with('success', 'Data meja berhasil di tambahkan!');
    }

    public function update(UpdatemejaRequest $request, string $id)
    {
        $meja = meja::find($id)->update($request->all());
        return redirect('meja')->with('success', 'Update data berhasil');
    }

    public function destroy($id)
    {
        meja::find($id)->delete();
        return redirect('meja')->with('success', 'Data kategori berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date . '_meja.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MejaImport, $request->import);
        return redirect()->back()->with('success', 'Import data meja berhasil');
    }

    public function generatepdf()
    {
        $meja = meja::all();
        $pdf = Pdf::loadView('meja.table', compact('meja'));
        return $pdf->download('meja.pdf');
    }
}
