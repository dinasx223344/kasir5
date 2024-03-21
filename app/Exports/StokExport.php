<?php

namespace App\Exports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class StokExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Stok::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'menu',
            'jumlah',
            'tanggal inpit',
            'tanggal update'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class  => function (AfterSheet $event) {
                $event->sheet->grtColumnDimension('A')->setAutoSize(true);
                $event->sheet->grtColumnDimension('B')->setAutoSize(true);
                $event->sheet->grtColumnDimension('C')->setAutoSize(true);
                $event->sheet->grtColumnDimension('D')->setAutoSize(true);

                $event->sheet->insertNewRoeBefore(1, 2);
                $event->sheet->mergeCells('A1, D1');
                $event->sheet->setCellValue('A1', 'Data Stok');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:D' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \phpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ]
                ]);
            }
        ];
    }
}
