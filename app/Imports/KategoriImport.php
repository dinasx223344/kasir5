<?php

namespace App\Imports;

use App\Models\kategori;
use App\Models\meja;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KategoriImport implements ToModel, WithHeadingRow
{
    public function headingRow()
    {
        return 3;
    }
    public function model(array $rows)
    {
        return new kategori([
            'nama_kategori' => $rows['nama_kategori'],
        ]);
    }
}
