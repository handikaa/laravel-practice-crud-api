<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Laptop Entry Level',
                'description' => 'Laptop untuk kebutuhan sehari-hari',
                'price' => 1000000,
                'stock' => 20,

            ],
            [
                'name' => 'Tablet Android',
                'description' => 'Tablet untuk multimedia',
                'price' => 2000000,
                'stock' => 15,

            ],
            [
                'name' => 'Smartphone Basic',
                'description' => 'Smartphone dengan fitur standar',
                'price' => 3000000,
                'stock' => 30,

            ],
            [
                'name' => 'Smartphone Midrange',
                'description' => 'Smartphone dengan performa lebih baik',
                'price' => 4000000,
                'stock' => 25,

            ],
            [
                'name' => 'Laptop Office',
                'description' => 'Laptop untuk kerja kantor',
                'price' => 5000000,
                'stock' => 12,

            ],
            [
                'name' => 'Gaming Monitor',
                'description' => 'Monitor untuk gaming',
                'price' => 6000000,
                'stock' => 10,

            ],
            [
                'name' => 'Laptop Gaming',
                'description' => 'Laptop untuk gaming performa tinggi',
                'price' => 7000000,
                'stock' => 8,

            ],
            [
                'name' => 'Ultrabook',
                'description' => 'Laptop tipis dan ringan',
                'price' => 8000000,
                'stock' => 9,

            ],
            [
                'name' => 'MacBook Air Clone',
                'description' => 'Laptop premium dengan desain elegan',
                'price' => 9000000,
                'stock' => 7,

            ],
            [
                'name' => 'Laptop Creator',
                'description' => 'Laptop untuk editing dan design',
                'price' => 10000000,
                'stock' => 5,

            ],
        ]);
    }
}
