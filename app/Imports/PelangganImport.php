<?php

namespace App\Imports;

use App\Models\pelanggan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    public function headingRow()
    {
        return 3;
    }
    public function model(array $rows)
    {
        return new pelanggan([
            'nama' => $rows['nama'],
            'email' => $rows['email'],
            'no_telp' => $rows['no_telp'],
            'alamat' => $rows['alamat'],
        ]);
    }
}
