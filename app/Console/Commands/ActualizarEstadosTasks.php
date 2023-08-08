<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class ActualizarEstadosTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:actualizar-estados-tasks';

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
        $tareasExpiradas = Task::where('expiration', '<', now())->get();

        foreach ($tareasExpiradas as $task)
        {
            if($task->status_id !=1)
            {

            }
        }
    }
}
