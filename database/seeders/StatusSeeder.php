<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Pendiente',
            'description' => 'La tarea aún no ha sido iniciada o está en progreso.'
        ]);
        Status::create([
            'name' => 'En Proceso',
            'description' => 'La tarea está en desarrollo o se encuentra actualmente en ejecución.'
        ]);
        Status::create([
            'name' => 'Completada',
            'description' => 'La tarea ha sido finalizada o completada exitosamente.'
        ]);
        Status::create([
            'name' => 'Cancelada',
            'description' => 'La tarea ha sido cancelada o interrumpida antes de su finalización.'
        ]);
    }
}
