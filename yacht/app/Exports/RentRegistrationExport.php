<?php

namespace App\Exports;

use App\Models\RentRegistrations;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Borders;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;

class RentRegistrationExport implements FromQuery,WithHeadings,WithEvents,ShouldAutoSize,WithMapping

{
    public function query()
    {
        return RentRegistrations::search()->yacht()->service()->date();
    }

    public function map($row): array
    {
            return ([
                $row->rent_registration_code,
                $row->rent_registration_name,
                $row->yachts->yacht_name,
                $row->services->service_name,
                $row->customers->customer_name,
                $row->rental_date,
                $row->rental_hours,
            ]);
    }

    public function headings(): array
    {
        return ([
            'Rent Registration Code',
            'Rent Registration Name',
            'Yacht Name',
            'Service',
            'Customer',
            'Rental Date',
            'Rental Hours',
        ]);
    }
    public function registerEvents(): array
    {
        $total=RentRegistrations::count();
        $row='G'.($total+1);
        $coodinate='A1:'.$row;
        return [
            AfterSheet::class    => function(AfterSheet $event) use($coodinate){
                $event->sheet->getStyle('A1:G1')->getFont()->setName('Calibri Light')->setSize(13)->setBold(true);
                $event->sheet->getStyle($coodinate)->getFont()->setName('Calibri Light')->setSize(12);
                $event->sheet->getStyle($coodinate)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $event->sheet->getStyle($coodinate)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THICK);
            },
        ];
    }

}
