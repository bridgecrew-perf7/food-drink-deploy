<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run()
    {
        Image::create(
            [
            'id' => 1,
            'image' => 'coca1.jpg',
            'product_id' => 1,
            'STT' => 1,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 2,
            'image' => 'coca2.png',
            'product_id' => 1,
            'STT' => 2,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 3,
            'image' => 'coca3.jpg',
            'product_id' => 1,
            'STT' => 3,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 4,
            'image' => 'pepsi1.jpg',
            'product_id' => 2,
            'STT' => 1,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 5,
            'image' => 'pepsi2.jpg',
            'product_id' => 2,
            'STT' => 2,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 6,
            'image' => 'pepsi3.jpeg',
            'product_id' => 2,
            'STT' => 3,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 7,
            'image' => 'piza1.jpg',
            'product_id' => 3,
            'STT' => 1,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 8,
            'image' => 'piza2.jpg',
            'product_id' => 3,
            'STT' => 2,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 9,
            'image' => 'piza3.jpg',
            'product_id' => 3,
            'STT' => 3,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 10,
            'image' => 'kfc1.jpg',
            'product_id' => 4,
            'STT' => 1,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 11,
            'image' => 'kfc2.jpg',
            'product_id' => 4,
            'STT' => 2,
            'status' => 1
            ],
        );
        Image::create(
            [
            'id' => 12,
            'image' => 'kfc3.jpg',
            'product_id' => 4,
            'STT' => 3,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 13,
            'image' => 'banh-mi-pho-mai1.jpg',
            'product_id' => 5,
            'STT' => 1,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 14,
            'image' => 'banh-mi-pho-mai2.jpg',
            'product_id' => 5,
            'STT' => 2,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 15,
            'image' => 'banh-mi-pho-mai3.jpg',
            'product_id' => 5,
            'STT' => 3,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 16,
            'image' => 'tra-sua-dau1.jpg',
            'product_id' => 6,
            'STT' => 1,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 17,
            'image' => 'tra-sua-dau2.png',
            'product_id' => 6,
            'STT' => 2,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 18,
            'image' => 'tra-sua-dau3.jpg',
            'product_id' => 6,
            'STT' => 3,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 19,
            'image' => 'capuchino1.jpg',
            'product_id' => 7,
            'STT' => 1,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 20,
            'image' => 'capuchino2.jpg',
            'product_id' => 7,
            'STT' => 2,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 21,
            'image' => 'capuchino3.jpg',
            'product_id' => 7,
            'STT' => 3,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 22,
            'image' => 'tradao1.jpg',
            'product_id' => 8,
            'STT' => 1,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 23,
            'image' => 'tradao2.png',
            'product_id' => 8,
            'STT' => 2,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 24,
            'image' => 'tradao3.png',
            'product_id' => 8,
            'STT' => 3,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 25,
            'image' => 'nem-cha-ran1.jpg',
            'product_id' => 9,
            'STT' => 1,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 26,
            'image' => 'nem-cha-ran2.jpg',
            'product_id' => 9,
            'STT' => 2,
            'status' => 1
            ]
        );
        Image::create(
            [
            'id' => 27,
            'image' => 'nem-cha-ran3.jpg',
            'product_id' => 9,
            'STT' => 3,
            'status' => 1
            ]
        );
        
    }
}
