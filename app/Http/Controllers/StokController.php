<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Http\Requests\StorestokRequest;
use App\Http\Requests\UpdatestokRequest;
use App\Models\stok;
use App\Models\jenis;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StokExport;
use App\Imports\StokImport;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['stok'] = stok::with(['menu'])->get();
        $data['menu'] = menu::get();
        return view('stok.index')->with($data);
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
    public function store(StoreStokRequest $request)
    { 
            // $stok = Stok::where('menu_id', $request->menu_id)->get()->first();
            // if (!$stok) {
                Stok::create($request->all());
            //     return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
            // }
            // $stok->jumlah = (int)$stok->jumlah + (int)$request->jumlah;
            // $stok->save();

            return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestokRequest $request, string $id)
    {
        $stok = stok::find($id)->update($request->all());
        return redirect('stok')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        menu::find($id)->delete();
        return redirect('menu')->with('success', 'Data menu berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new StokExport, $date . '_stok.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new StokImport, $request->import);
        return redirect()->back()->with('success', 'Import data jenis berhasil');
    }
       
}
