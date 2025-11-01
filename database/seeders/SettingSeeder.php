<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'id'=>1,
            'site_name'=>'Ecommerce',
            'email'=>'taher@example.com',
            'phone'=>'0123456789',
            'address'=>'Dhaka',
            'email_support'=>'taher@gmail.com',
            'facebook'=>'https://www.facebook.com',
            'twitter'=>'https://www.twitter.com',
            'youtube'=>'https://www.youtube.com',
            'logo'=>'logo.png',
            'favicon'=>'favicon.png',
        ]);
    }
}
