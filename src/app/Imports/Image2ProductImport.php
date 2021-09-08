<?php

namespace App\Imports;

use App\Models\Image;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Image2ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
       /**
        * @param array $row
        *
        * @return \Illuminate\Database\Eloquent\Model|null
        */

        return new Image([
            'image' => $row['image'],
            'product_id' => $row['id'], 
            'STT' => $row['stt2'], 
            'status' => $row['status'], 
        ]);
    }
}
