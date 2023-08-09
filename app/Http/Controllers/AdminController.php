<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(){
        return Inertia::render('AdminDashboard', [
            'estas' => 'sipa'
        ]);
    }

    public function create(){

    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return redirect()->with('success', 'Tarea creada correctamente');

    }
    public function storeUser(){

    }
}
