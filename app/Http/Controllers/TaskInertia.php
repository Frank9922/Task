<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistorialResource;
use App\Http\Resources\TaskResource;
use App\Models\Historial_estado;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskInertia extends Controller
{

    public function index()
    {
        $task = Task::with([
            'historialEstados',
            'user',
            'userby',
            'status'
        ])->paginate(6);
        return Inertia::render('Index', [
            'tasks'=> TaskResource::collection($task)
        ]);
    }

    public function show(string $id)
    {
        $historial = Historial_estado::where('task_id', $id)->with('task')->get();
        return Inertia::render('ShowTask', [
            'item' => new TaskResource(Task::find($id)),
            'historial' => HistorialResource::collection($historial)

        ]);
    }

}
