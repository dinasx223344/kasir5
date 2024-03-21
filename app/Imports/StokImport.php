<?php

namespace App\Imports;

use App\Models\stok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            stok::create([
                'menu_id' => $row['menu'],
                'jumlah' => $row['jumlah'],
            ]);
        }
    }
}
