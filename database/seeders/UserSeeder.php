<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        
        
        // ::create([
        //     'name' => 'John Doe',
        //     'email' => 'taher@gmail.com',
        //     'password' => bcrypt('password'),
        //     'phone' => '1234567890',
        //     'city_id' => City::inRandomOrder()->first()->id,

        // ]);
    }
}
