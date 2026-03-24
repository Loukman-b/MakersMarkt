<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create(['name' => 'Sieraden']);
        ProductType::create(['name' => 'Keramiek']);
        ProductType::create(['name' => 'Textiel']);
        ProductType::create(['name' => 'Kunst']);
    }
}
