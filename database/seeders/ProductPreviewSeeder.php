<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPreview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPreviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductPreview::factory()->count(10)->create();
    }
}
