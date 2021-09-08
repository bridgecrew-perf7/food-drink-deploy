<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Evaluates;
use App\Models\Product;
use App\Models\User;

class EvaluatesSeeder extends Seeder
{
    public function run()
    {
        $limit = 100; // Number create
        for ($i = 0; $i < $limit; $i++) {
            Evaluates::create([
                'review'     => Str::random(50),
                'rating'     => rand(1, 5),
                'product_id' => Product::all()->random()->id,
                'user_id'    => User::all()->random()->id,
            ]);
        }
    }
}
