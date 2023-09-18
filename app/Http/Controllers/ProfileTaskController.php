<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistorialResource;
use App\Http\Resources\SimpleTaskResource;
use App\Http\Resources\UserResource;
use App\Models\Task;
use App\Models\Historial_estado;
use Symfony\Component\HttpFoundation\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileTaskController extends Controller
{
    public function index(){
        $user = Auth::user();
        $tasksv2 = Task::with([
            'status'
            ])
              ->where('user_id', $user->id)
              ->orderBy('status_id', 'asc')
              ->get();

        $historialCompleto = Historial_estado::whereHas('task', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with([
            'estadoAnterior',
            'estadoPosterior'
        ])
        ->orderBy('timestamp', 'asc')
        ->get();


        return Inertia::render('ProfileTask', [
            'user'=> new UserResource($user),
            'task' => SimpleTaskResource::collection($tasksv2),
            'historialCompleto' => HistorialResource::collection($historialCompleto)
            //'historialCompleto' => $historialCompleto
        ]);
    }

    public function updateStatus(Request $request)
    {
        $payload = $request->input('payload');
        $taskId = $payload['id'];
        $newStatus = $payload['estado']+1;

        try{
            DB::beginTransaction();
            $task = Task::find($taskId);
            $task->updateAndMakeHistorial($newStatus);
            DB::commit();
        }
        catch (\Exception $e){
            DB::rollback();

            return Inertia::render('ProfileTask', [
                'error' => 'Ha ocurrido un error al actualizar el estado de la tarea'
            ]);
        }
    }
}
