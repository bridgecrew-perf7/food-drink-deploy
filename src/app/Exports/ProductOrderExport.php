<?php

namespace App\Exports;

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
use App\Models\OrderProduct;

class ProductOrderExport implements FromCollection,WithHeadings,WithEvents, ShouldAutoSize,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrderProduct::OrderProductJoin()
        ->WhereStatisticProduct(date("Y-m-d"))
        ->SelectStatisticProduct()
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
            __('custom.Image'),
            __('custom.Date time'),
            __('custom.Amount Of Order'),
            __('custom.Total Money'), 
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
