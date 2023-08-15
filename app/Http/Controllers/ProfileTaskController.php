<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleTaskResource;
use App\Http\Resources\UserResource;
use App\Models\Task;
use Inertia\Inertia;
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

    public function updateStatus()
    {

    }
}
