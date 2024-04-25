<?php

namespace App\Http\Controllers;

use App\Exports\absensiExport;
use App\Models\absensi;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\absensiImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Pdf;
use PDOException;


class absensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'absensi';
        $data['absensi'] = absensi::get();
        return view('absensi.index')->with($data);
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
    public function store(StoreabsensiRequest $request)
    {
        absensi::create($request->all());
        return redirect('absensi')->with('success', 'Data absensi berhasil di tambahkan!');
    }

    public function update(UpdateabsensiRequest $request, string $id)
    {
        $absensi = absensi::find($id)->update($request->all());
        return redirect('absensi')->with('success', 'Update data berhasil');
    }

    public function destroy($id)
    {
        absensi::find($id)->delete();
        return redirect('absensi')->with('success', 'Data absensi berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new absensiExport, $date . '_absensi.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new absensiImport, $request->import);
        return redirect()->back()->with('success', 'Import data berhasil');
    }


    public function generatepdf()
    {
        $absensi = absensi::all();
        $pdf = ::loadView('absensi.table', compact('absensi'));
        return $pdf->download('absensi.pdf');
    }
}
