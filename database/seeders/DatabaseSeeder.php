<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Test Product',
            'price' => 22.50,
            'status' => 'stock',
            'stock_quantify' => 10
        ]);
    }
}
