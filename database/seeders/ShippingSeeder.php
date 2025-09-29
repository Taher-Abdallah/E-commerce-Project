<?php

namespace Database\Seeders;

use App\Models\Governorate;
use App\Models\ShippingGovernorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gov=Governorate::all();
        foreach ($gov as $governorate) {
            ShippingGovernorate::updateorCreate([
                'governorate_id' => $governorate->id,
                'price' => rand(10, 100),
            ]);
        }
    }
}
