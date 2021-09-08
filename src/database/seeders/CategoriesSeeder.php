<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
      Categories::create(
          [
          'name'              => 'Coca',
          'slug'              => Str::slug('Coca'),
          'status'            => 1,
          'category_types_id' => 2
          ]
      );
      Categories::create(
          [
            'name'              => 'Pepsi',
            'slug'              => Str::slug('Pepsi'),
            'status'            => 1,
            'category_types_id' => 2
          ]
      );
      Categories::create(
        [
          'name'              => 'Piza',
          'slug'              => Str::slug('Piza'),
          'status'            => 1,
          'category_types_id' => 1
        ]
      );
      Categories::create(
        [
          'name'              => 'KFC',
          'slug'              => Str::slug('KFC'),
          'status'            => 1,
          'category_types_id' => 1
        ]
      );
      Categories::create(
        [
          'name'              => 'Bánh Mì',
          'slug'              => Str::slug('Bánh Mì'),
          'status'            => 1,
          'category_types_id' => 1
        ]
      );
      Categories::create(
        [
          'name'              => 'Trà Sữa',
          'slug'              => Str::slug('Trà Sữa'),
          'status'            => 1,
          'category_types_id' => 2
        ]
      );
      Categories::create(
        [
          'name'              => 'Coffee',
          'slug'              => Str::slug('Coffee'),
          'status'            => 1,
          'category_types_id' => 2
        ]
      );
      Categories::create(
        [
          'name'              => 'Trà Đào',
          'slug'              => Str::slug('Trà Đào'),
          'status'            => 1,
          'category_types_id' => 2
        ]
      );
      Categories::create(
        [
          'name'              => 'Nem chả',
          'slug'              => Str::slug('Nem chả'),
          'status'            => 1,
          'category_types_id' => 1
        ]
      );
      Categories::create(
        [
          'name'              => 'Sting',
          'slug'              => Str::slug('Sting'),
          'status'            => 1,
          'category_types_id' => 2
        ]
      );
    }
}
