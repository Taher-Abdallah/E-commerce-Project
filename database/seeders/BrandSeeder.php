<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Brand::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $brands = [
            [
                'name' => 'Nike',
                'logo' => 'https://1000logos.net/wp-content/uploads/2017/03/Nike-Logo.png',
            ],
            [
                'name' => 'Adidas',
                'logo' => 'https://1000logos.net/wp-content/uploads/2016/11/Adidas-Logo.png',
            ],
            [
                'name' => 'Puma',
                'logo' => 'https://1000logos.net/wp-content/uploads/2017/05/Puma-logo.png',
            ],
            [
                'name' => 'Reebok',
                'logo' => 'https://1000logos.net/wp-content/uploads/2017/03/Reebok-Logo-500x281.png',
            ],
            [
                'name' => 'Under Armour',
                'logo' => 'https://1000logos.net/wp-content/uploads/2020/05/Under-Armour-Logo.png',
            ],
            [
                'name' => 'New Balance',
                'logo' => 'https://1000logos.net/wp-content/uploads/2017/03/New-Balance-logo.png',
            ],
            [
                'name' => 'Converse',
                'logo' => 'https://1000logos.net/wp-content/uploads/2017/05/Converse-logo.png',
            ],
            [
                'name' => 'Vans',
                'logo' => 'https://1000logos.net/wp-content/uploads/2017/05/Vans-logo.png',
            ],
            [
                'name' => 'Fila',
                'logo' => 'https://1000logos.net/wp-content/uploads/2017/05/Fila-logo.png',
            ],
            [
                'name' => 'ASICS',
                'logo' => 'https://1000logos.net/wp-content/uploads/2020/05/ASICS-Logo.png',
            ],
        ];




        foreach ($brands as $brand) {
            \App\Models\Brand::create($brand);
        }}
}
