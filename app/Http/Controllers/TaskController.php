<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Historial_estado;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


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
                    'data' => TaskResource::collection($tasks)
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


    public function show(string $id)
    {
        if(Task::find($id)){
            return new TaskResource(Task::find($id));
        }
        else {
            return response()->json([
                'Message' => 'No se encontro la tarea con el id '.$id.', Por favor verifique su consulta!'
            ], 400);
        }
    }

    public function update(UpdateTaskRequest $request, $id) : JsonResponse
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

    public function historial(int $id)
    {
        return response()->json([
            'data' => Historial_estado::where('task_id', $id)->get()
        ]);
    }

    public function pruebas()
    {
        $tasks = Task::select('id', 'user_id')->orderBy('id', 'asc')->get();
        foreach($tasks as $task){
        for($i=1; $i<=2; $i++){
            $aux = $i + 1;
            DB::table('historial_estados')->insert([
            'user_id' => $task->user_id,
            'task_id' => $task->id,
            'estado_anterior_id'=> $i,
            'estado_posterior_id' =>$aux,
            'timestamp' => now()
            ]);

        };}
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
