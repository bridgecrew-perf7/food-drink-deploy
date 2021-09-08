<?php

namespace App\Imports;


use App\Models\Categories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
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

        return new Categories([
            'name' => $row['name'],
            'category_types_id' => $row['category_types_id'], 
            'slug' => $row['slug'],
            'status' => $row['status'], 
        ]);
    }
}
