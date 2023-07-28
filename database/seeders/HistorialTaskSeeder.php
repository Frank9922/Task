<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historial_estado;

class HistorialTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Historial_estado::create([
            'task_id' => 1,
            'user_id' => 1,
            'timestamp' => now(),
            'estado_anterior_id' => 1,
            'estado_actual_id' => 2,
        ]);

        Historial_estado::create([
            'task_id' => 1,
            'user_id' => 1,
            'timestamp' => fake()->dateTime(),
            'estado_anterior_id' => 2,
            'estado_actual_id' => 3,
        ]);
    }
}
