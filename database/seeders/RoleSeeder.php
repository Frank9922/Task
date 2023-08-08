<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create([
            'name' => 'admin'
        ]);
        Roles::create([
            'name' => 'User'
        ]);
        Roles::create([
            'name' => 'guest'
        ]);
    }
}
