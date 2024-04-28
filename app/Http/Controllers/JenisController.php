<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use Exception;
use Illuminate\Database\QueryException;
use App\Exports\JenisExport as ExportsJenisExports;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JenisExport;
use App\Imports\JenisImport;
use Illuminate\Http\Request;
use PDF;

class jenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'jenis';
        $data['jenis'] = jenis::get();
        return view('jenis.index')->with($data);
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
    public function store(StorejenisRequest $request)
    {
        jenis::create($request->all());
        return redirect('jenis')->with('success', 'Data jenis berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejenisRequest $request, string $id)
    {
        $jenis = jenis::find($id)->update($request->all());
        return redirect('jenis')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        jenis::find($id)->delete();
        return redirect('jenis')->with('success', 'Data jenis berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new JenisExport , $date . '_jenis.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new JenisImport, $request->import);
        return redirect()->back()->with('success', 'Import data jenis berhasil');
    }

   public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = jenis::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('jenis/jenis-pdf', ['jenis'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-jenis.pdf');
    }
}