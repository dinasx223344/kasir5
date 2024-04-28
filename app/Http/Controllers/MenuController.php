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
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PDF;

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


    public function update(updatemenuRequest $request, string $id)
    {
        $menu = menu::find($id);
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;

        $menu->update($data);
        return redirect('menu')->with('success', 'Update data berhasil');
    }

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

    // public function generatepdf()
    // {
    //     $menu = menu::all();
    //     $pdf = Pdf::loadView('menu.table', compact('menu'));
    //     return $pdf->download('menu.pdf');
    // }

    public function generatepdf()
    {
        // Get data
        $menu = menu::all();

        // Loop through menu items and encode images to base64
        foreach ($menu as $p) {
            $imagePath = public_path('images/' . $p->image);
            if (file_exists($imagePath)) {
                $imageData = base64_encode(file_get_contents($imagePath));
                $p->imageData = $imageData;
            } else {
                // Handle the case where the image file doesn't exist
                $p->imageData = null; // Or any other appropriate handling
            }
        }

        // Generate PDF
        $dompdf = new Dompdf();
        $html = View::make('menu.table', compact('menu'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Return the PDF as a download
        return $dompdf->stream('menu.pdf');
    }
    
}
