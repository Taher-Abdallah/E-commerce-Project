<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'id' => 1,
                'name' => 'Egypt',
                'phone_code' => '20'],
            [
                'id' => 2,
                'name' => 'Saudi Arabia',
                'phone_code' => '966'
            ]
        ];

        foreach ($countries as $country) {
            Country::UpdateOrCreate($country);
        }
    }
}
