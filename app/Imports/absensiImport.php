<?php

namespace App\Imports;

use App\Models\absensi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class absensiImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        //check if the 'nama_karyawan' key exist and is not null
       if (isset($row['nama_karyawan']) && $row ['nama_karyawan'] !== null) {
         absensi::create([
            'nama_karyawan' => $row['nama_karyawan'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'waktu_masuk' => $row['waktu_masuk'],
            'status' => $row['status'],
            'waktu_keluar' => $row['waktu_keluar'],
           
         ]);
         }

    }
}
