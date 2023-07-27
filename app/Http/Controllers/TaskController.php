<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    public function index(Request $request) : JsonResponse
    {
        $filters = [
            'id' => 'filterById',
            'title' => 'filterByTitle',
            'content' => 'filterByContent',
            'user' => 'filterByUser',
            'status' => 'filterByStatus',
        ];
        $llaves = [];
        $llaves = $request->all();
        if (empty($llaves))
            {
                return response()->json([
                    'succes' => true,
                    'filtros' => false,
                    'data'=> TaskResource::collection(Task::all())
                ]);
            }
        else
            {
                $query = Task::query();
                foreach($filters as $field => $method){
                    if($request->has($field)){
                        $query = $this->$method($query, $request->input($field));
                    }
                }
                $tasks = $query->get();
                return response()->json([
                  'succes' => true,
                    'filtros' => true,
                    'data' => $tasks
                ]);
            }
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

    private function filterById($query, $value)
    {
        return $query->where('id', $value);
    }

    private function filterByTitle($query, $value)
    {
        return $query->where('title', 'like', '%'. $value. '%');
    }

    private function filterByContent($query, $value)
    {
        return $query->where('content', 'like', '%'. $value. '%');
    }

    private function filterByUser($query, $value)
    {
        return $query->where('user_id', $value);
    }

    private function filterByStatus($query, $value)
    {
        return $query->where('status_id', $value);
    }

}
