<?php

namespace App\Imports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TagImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Tag([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'status' => $row['status'], 
        ]);
    }
}
