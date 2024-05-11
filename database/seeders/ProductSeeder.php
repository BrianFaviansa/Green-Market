<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'product_name' => 'Apel',
                'price' => 15000,
                'product_desc' => 'Apel Malang',
                'product_image' => 'apel.png',
            ],
            [
                'category_id' => 1,
                'product_name' => 'Lemon',
                'price' => 20000,
                'product_desc' => 'Lemon California',
                'product_image' => 'lemon.png',
            ],
            [
                'category_id' => 2,
                'product_name' => 'Kentang',
                'price' => 8000,
                'product_desc' => 'Kentang lokal',
                'product_image' => 'kentang.png',
            ],
            [
                'category_id' => 2,
                'product_name' => 'Terong',
                'price' => 7000,
                'product_desc' => 'Terong lokal',
                'product_image' => 'terong.png',
            ],
        ];
    }
}
