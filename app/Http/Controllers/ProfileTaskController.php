<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleTaskResource;
use App\Http\Resources\UserResource;
use App\Models\Task;
use Symfony\Component\HttpFoundation\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileTaskController extends Controller
{
    public function index(){
        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)->orderBy('status_id', 'asc')->get();
        return Inertia::render('ProfileTask', [
            'user'=> new UserResource($user),
            'task' => SimpleTaskResource::collection($tasks)
        ]);
    }

    public function updateStatus(Request $request)
    {
        $dato = $request->input('payload');
        $id = $dato['id'];
        $estado = $dato['estado'];
        $task = Task::where('id', $dato['id'])->first();

        DB::beginTransaction();

        DB::table('tasks')
                ->where('id', '=', $dato['id'])
                ->update(['status_id' => $dato['estado']+1]);
        DB::table('historial_estados')
                ->insert([
                    'task_id' => $id,
                    'user_id' =>$task->user_id,
                    'estado_anterior_id' => $estado,
                    'estado_posterior_id' =>$estado+1,
                    'timestamp' => now()
                  ]);
        DB::commit();


        $historial = DB::table('historial_estados')->get();
        return Inertia::render('ProfileTasks', [
            'update' => 'El estado de la tarea se ha actualizado correctamente'
        ]);
    }
}
