<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\RoleUser;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleUser::create([
            'name' => 'admin'
        ]);
        RoleUser::create([
            'name' => 'User'
        ]);
        RoleUser::create([
            'name' => 'guest'
        ]);
    }
}
