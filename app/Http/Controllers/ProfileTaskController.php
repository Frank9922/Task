<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileTaskController extends Controller
{
    public function index(){
        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)->get();
        return Inertia::render('ProfileTask', [
            'user'=> new UserResource($user),
            'tasks'=>TaskResource::collection($tasks)
        ]);
    }
}
