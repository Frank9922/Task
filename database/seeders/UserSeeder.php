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
            'name' =>  'Franco Leiva',
            'email' => 'francoleiva990@gmail.com',
            'password' => Hash::make('123456789'),
            'role_id' => 1
        ]);
        User::factory()->count(30)->create();
    }
}
