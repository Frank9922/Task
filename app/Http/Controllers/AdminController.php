<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(){
        return Inertia::render('AdminDashboard');
    }

    public function showtask()
    {
        return Inertia::render('AdminIndextask');
    }

    public function create(){
        return Inertia::render('AdminCreateTask');
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return redirect('/admin')->with('success', 'Tarea creada correctamente');
    }

}
