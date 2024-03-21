<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use App\Models\jenis;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use Illuminate\Http\Request;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['menu'] = menu::with(['jenis'])->get();
        $data['jenis'] = jenis::get();
        return view('menu.index')->with($data);
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
    public function store(StoremenuRequest $request)
    {
        // $menu = menu::find($id);
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;
        
        menu::create($data);

        return redirect('menu')->with('success', 'Data menu berhasil di tambahkan!');

        return back()->with('success' . 'You have successfully uploaded ann image.')->with('images', $imageName);
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemenuRequest $request, string $id)
    {
        $menu = menu::find($id)->update($request->all());
        return redirect('menu')->with('success', 'Update data berhasil');
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
        return Excel::download(new MenuExport, $date . '_menu.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MenuImport, $request->import);
        return redirect()->back()->with('success', 'Import data jenis berhasil');
    }
}
