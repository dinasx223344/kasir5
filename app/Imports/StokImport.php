<?php

namespace App\Imports;

use App\Models\stok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StokImport implements ToCollection, WithHeadingRow
{
    public function headingRow()
    {
        return 3;
    }
    
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            stok::create([
                'menu_id' => $row['menu_id'],
                'jumlah' => $row['jumlah'],
            ]);
        }
    }
}
