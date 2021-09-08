<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
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

        return new Product([
            'id' => $row['id'],
            'name' => $row['name'],
            'category_id' => $row['category_id'], 
            'amount_of' => $row['amount_of'],
            'price' => $row['price'], 
            'slug' => Str::slug($row['name']),
            'status' => $row['status'], 
        ]);
        

    }
}
