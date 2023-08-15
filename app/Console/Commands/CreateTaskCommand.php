<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class CreateTaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:task {user} {cantidad}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear tareas asignadas a un usuario en especifico';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for($i=1; $i<= $this->argument('cantidad'); $i++)
        {
          Task::create([
            'title' => fake()->name(),
            'content' => fake()->text(800),
            'short_description' => fake()->text(50),
            'expiration' => fake()->dateTimeBetween('now', '+2 weeks'),
            'user_id' => $this->argument('user'),
            'created_by' => 1,
            'status_id'=> fake()->numberBetween(1, 5)
          ]);
        }
        return Command::SUCCESS;
    }
}
