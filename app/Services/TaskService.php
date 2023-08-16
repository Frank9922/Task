<?php
namespace App\Services;

use App\Models\Task;
use App\Models\Historial_estado;

class TaskService
{
    public function getTaskWithHistorial($user)
    {
        $tasks = Task::where('user_id', $user->id)
                    ->orderBy('status_id', 'asc')
                    ->get();

        $taskIds = $tasks->pluck('id')->toArray();

        $historial = Historial_estado::whereIn('task_id', $taskIds)
                                    ->orderBy('task_id', 'asc')
                                    ->get();
        return compact('tasks', 'historial');
    }
}

?>
