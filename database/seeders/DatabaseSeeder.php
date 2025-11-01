<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Faq;
use Attribute;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use PHPUnit\Framework\Constraint\Count;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         $this->call([
            
             RoleSeeder::class,
             AdminSeeder::class,
            FaqSeeder::class,
            AttributeSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            CountrySeeder::class,



        ]);
    }
}
