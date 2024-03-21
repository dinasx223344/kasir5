<?php

namespace App\Exports;


use App\Models\Menu;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use \Maatwebsite\Excel\Sheet;


class MenuExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Menu::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'nama_menu',
            'jenis',
            'harga',
            'image',
            'deskripsi',
            'tanggal input',
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
                $event->sheet->grtColumnDimension('E')->setAutoSize(true);
                $event->sheet->grtColumnDimension('F')->setAutoSize(true);
                $event->sheet->grtColumnDimension('G')->setAutoSize(true);

                $event->sheet->insertNewRoeBefore(1, 2);
                $event->sheet->mergeCells('A1, G1');
                $event->sheet->setCellValue('A1', 'Data Menu');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:G' . $event->sheet->getHighestRow())->applyFromArray([
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
