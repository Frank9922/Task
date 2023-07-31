<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Franco Leiva',
            'password' => Hash::make('123456789'),
            'email' => 'francoleiva990@gmail.com',
        ]);

        User::factory()->count(30)->create();
    }
}
