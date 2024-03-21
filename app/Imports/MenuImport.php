<?php

namespace App\Imports;

use App\Models\menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            menu::create([
                'nama_menu' => $row['nama_menu'],
                'jenis_id' => $row['jenis'],
                'harga' => $row['harga'],
                'image' => $row['image'],
                'deskripsi' => $row['deskripsi'],
            ]);
        }
    }
}
