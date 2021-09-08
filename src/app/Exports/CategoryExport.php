<?php

namespace App\Exports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CategoryExport implements FromCollection,WithHeadings,WithEvents, ShouldAutoSize,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categories::join('category_type','categories.category_types_id','=','category_type.id')
        ->select('categories.id as ID','categories.name as Brand','category_type.name as Category','categories.status',
        'categories.created_at','categories.updated_at')
        ->get();
    }

    /**
     * Returns headers for report
     * @return array
     */
    public function headings(): array {
        return [
            'ID',
            __('custom.Category Name'),
            __('custom.Category group'), 
            __('custom.Status'),
            __('custom.Created at'),
            __('custom.Update at'),
            
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:F1';
                $event->sheet->getDelegate()
                    ->getStyle($cellRange)
                    ->getFont()
                    ->setSize(13)
                    ->getColor()->setRGB('0000ff');
            }
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_XLSX22,
            'F' => NumberFormat::FORMAT_DATE_XLSX22,
        ];
    }

}
