<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Роза',
                'price' => 100,
                'img' => 'roza.jpg',
                'product_type' => 1,
                'country' => 'Голандия',
                'color' => 'Розовый',
                'qty' => 200,
                'created_at' => date('2024-02-19')
            ],
            [
                'title' => 'Цветок-бабочка',
                'price' => 400,
                'img' => 'cvetok-babochka.jpg',
                'product_type' => 1,
                'country' => 'Шотландия',
                'color' => 'Фиолетовый',
                'qty' => 100,
                'created_at' => date('2024-02-03')
            ],
            [
                'title' => 'Роза черная',
                'price' => 140,
                'img' => 'images_cms-image-000036756.jpg',
                'product_type' => 1,
                'country' => 'Голандия',
                'color' => 'Черный',
                'qty' => 40,
                'created_at' => date('2024-02-13')
            ],
            [
                'title' => 'Лотос',
                'price' => 440,
                'img' => 'pasted image 0.png',
                'product_type' => 1,
                'country' => 'Испания',
                'color' => 'Насыщенно-розовый',
                'qty' => 30,
                'created_at' => date('2024-07-13')
            ],
            [
                'title' => 'Фиалки',
                'price' => 250,
                'img' => 'imagetools7-3.jpg',
                'product_type' => 1,
                'country' => 'Россия',
                'color' => 'Фиолетовый',
                'qty' => 300,
                'created_at' => date('2024-02-23')
            ]
        ]);
    }
}
