<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\detailTransaksi;
use App\Http\Requests\StoredetailTransaksiRequest;
use App\Http\Requests\UpdatedetailTransaksiRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Detail Transaksi';
        $data['detailTransaksi'] = detailTransaksi::all();
        return view('laporan.index')->with($data);
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
    public function store(StoredetailTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedetailTransaksiRequest $request, detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detailTransaksi $detailTransaksi)
    {
        //
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new LaporanExport, $date . '_laporan.xlsx');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = detailTransaksi::all();

        // Render view ke HTML
        $pdf = PDF::loadView('laporan/laporan-pdf', ['detailTransaksi' => $data]);
        $date = date('Y-m-d');
        return $pdf->download($date . '-data-laporan.pdf');
    }
}
