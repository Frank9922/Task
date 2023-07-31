<?php

namespace App\Http\Controllers;
use App\Http\Resources\TaskResource;
use Inertia\Inertia;
use App\Models\Task;

class TaskInertia extends Controller
{
    public function index()
    {
        return Inertia::render('Index', [
            'tasks'=> TaskResource::collection(Task::all())
        ]);
    }

    public function show(string $id)
    {
    return Inertia::render('ShowTask', [
        'item' => new TaskResource(Task::find($id))
        ]);
    }
}
