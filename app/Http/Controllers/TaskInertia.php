<?php

namespace App\Http\Controllers;
use App\Http\Resources\VueTask;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Task;

class TaskInertia extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Index', [
            'tasks'=> VueTask::collection(Task::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    // return response()->json([
    //     'task'=> new VueTask(Task::find($id))
    //     ]);
    return Inertia::render('ShowTask', [
        'item' => new VueTask(Task::find($id))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
