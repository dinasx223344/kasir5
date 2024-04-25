<?php

namespace App\Imports;

use App\Models\menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToModel, WithHeadingRow
{
    public function headingRow()
    {
        return 3;
    }
    public function model(array $rows)
    {
        return new menu([
            'nama_menu' => $rows['nama_menu'],
            'jenis_id' => $rows['jenis_id'],
            'harga' => $rows['harga'],
            'image' => $rows['image'],
            'deskripsi' => $rows['deskripsi'],
        ]);
    }
}
