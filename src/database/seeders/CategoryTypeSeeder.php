<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryType;

class CategoryTypeSeeder extends Seeder
{
    public function run()
    {
      $category_types = [
        ['Food', 'food'],
        ['Drink', 'drink'],
      ];

      foreach ($category_types as $row) {
        CategoryType::create([
          'name' => $row[0],
          'slug' => $row[1],
        ]);
      }
    }
}
