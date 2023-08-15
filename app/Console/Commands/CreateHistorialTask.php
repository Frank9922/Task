<?php

namespace App\Console\Commands;

use App\Models\Historial_estado;
use App\Models\Task;

use Illuminate\Console\Command;

class CreateHistorialTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:historial {task_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user_id = Task::select('user_id')->where('id', '=', $this->argument('task_id'));
        for($i=1; $i<=4; $i++){
            Historial_estado::create([
                'task_id' => $this->argument('task_id'),
                'user_id' => $user_id,
                'estado_anterior_id'=> $i,
                'estado_posterior_id' => $i
            ]);
        }
    }
}
