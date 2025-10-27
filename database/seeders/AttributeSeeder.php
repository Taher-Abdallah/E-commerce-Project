<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttributeSeeder extends Seeder
{

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Attribute::truncate();
        AttributeValue::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $size_attribute = Attribute::create([
            'name' => 'Size',
            
        ]);

        $size_attribute->attributeValues()->createMany([
            [
                'value' => 'Small',
            ],
            [
                'value' => 'Medium',
               
            ],
            [
                'value' => 'Large',
            ],
        ]);

        $colorAttribute = Attribute::create([
            'name' => 'Color',
        ]);

        $colorAttribute->attributeValues()->createMany([
            [
                'value' => 'Red',
            ],
            [
                'value' => 'Green',
            ],
            [
                'value' => 'Blue',
            ],
            [
                'value' => 'Yellow',
            ],
            [
                'value' => 'Orange',
            ],
            [
                'value' => 'Black',
            ],
            [
                'value' => 'White',
            ],
        ]);
    }
}
