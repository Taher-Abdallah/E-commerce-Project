<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [];
        foreach (config('permessions') as $key => $value) {
            $permission[] = $key;
        };
        Role::create([
            'role' => 'admin',
            'permission' => $permission
        ]);
    }
}
