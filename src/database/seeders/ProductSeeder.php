<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(
          [
            'name'        => 'coca cola lon',
            'slug'        => Str::slug('coca cola lon'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 1,
          ]
        );
        Product::create(
          [
            'name'        => 'pepsi lon',
            'slug'        => Str::slug('pepsi lon'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 2,
          ]
        );
        Product::create(
          [
            'name'        => 'piza',
            'slug'        => Str::slug('piza'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 3,
          ]
        );
        Product::create(
          [
            'name'        => 'Gà rán KFC',
            'slug'        => Str::slug('Gà rán KFC'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 4,
          ]
        );
        Product::create(
          [
            'name'        => 'Bánh mì phô mai',
            'slug'        => Str::slug('Bánh mì phô mai'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 5,
          ]
        );
        Product::create(
          [
            'name'        => 'Trà Sữa Dâu',
            'slug'        => Str::slug('Trà Sữa Dâu'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 6,
          ]
        );
        Product::create(
          [
            'name'        => 'Cà phê Capuchino',
            'slug'        => Str::slug('Cà phê Capuchino'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 7,
          ]
        );
        Product::create(
          [
            'name'        => 'Trà Đào cam sả',
            'slug'        => Str::slug('Trà Đào cam sả'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 8,
          ]
        );
        Product::create(
          [
            'name'        => 'Nem chả rán',
            'slug'        => Str::slug('Nem chả rán'),
            'status'      => 1,
            'content'     => Str::random(50),
            'amount_of'   => rand(1, 20),
            'price'       => rand(1000, 500000),
            'category_id' => 9,
          ]
        );

    }
}
