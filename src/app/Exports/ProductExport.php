<?php

namespace App\Exports;

use App\Models\Product;
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

class ProductExport implements FromCollection,WithHeadings,WithEvents, ShouldAutoSize,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::join('categories','categories.id','=','products.category_id')
        ->select('products.id as id_product','products.name as name_product','categories.name as name_category','products.amount_of','products.price','products.status as status_product',
        'products.created_at','products.updated_at')
        ->get();
    }

    /**
     * Returns headers for report
     * @return array
     */
    public function headings(): array {
        return [
            __('custom.ID Product'),
            __('custom.Product Name'),
            __('custom.Category'),
            __('custom.Amount Of'),
            __('custom.Price'), 
            __('custom.Status'),
            __('custom.Created at'),
            __('custom.Update at'),

        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:H1';
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
            'G' => NumberFormat::FORMAT_DATE_XLSX22,
            'H' => NumberFormat::FORMAT_DATE_XLSX22,
        ];
    }
}
