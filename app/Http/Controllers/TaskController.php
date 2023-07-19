<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    public function index() : JsonResource
    {
        return TaskResource::collection(Task::all());
    }

    public function store(TaskRequest $request) : JsonResponse
    {
        $task = Task::create($request->all());
        return response()->json([
            'success' => true,
            'data' => new TaskResource($task)
        ], 201);
    }


    public function show(string $id) : JsonResource
    {
        return new TaskResource(Task::find($id));
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json([
          'success' => true,
            'data' => new TaskResource($task)
        ], 200);
    }

    public function destroy(string $id)
    {
        Task::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => "Deleted $id"
        ], 200);
    }
}
