<?php

namespace App\Imports;

use App\Models\produk_titipan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class titipanProdukImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            produk_titipan::create([
                'nama_produk' => $row['nama_produk'],
                'nama_supplier' => $row['nama_supplier'],
                'harga_beli' => $row['harga_beli'],
                'harga_jual' => $row['harga_jual'],
                'stok' => $row['stok'],
                'keterangan' => $row['keterangan'],
            ]);
        }
    }
}
