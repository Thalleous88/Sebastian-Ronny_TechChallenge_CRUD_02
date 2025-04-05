<?php

namespace Database\Seeders;

use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // untuk seeding database dengan 20 data berdasarkan data random dari factory
    public function run(): void
    {
        Product::factory()->count(20)->create();
    }
}
