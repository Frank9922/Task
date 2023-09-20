<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Inertia\Inertia;

class PublicUserController extends Controller
{
    public function index()
    {
        $users = User::with('role')
                    ->orderBy('id', 'asc')
                    ->withCount(['tasks as completed_tasks' => function ($query){
                        $query->where('status_id', 3);
                    }])
                    ->paginate(10);
        return Inertia::render('PublicUser', [
            'users' => $users
        ]);
    }

    public function showUser($id)
    {
        return Inertia::render('ShowUser', [
            'tasks' => Task::with('status')->where('user_id', $id)->get()
        ]);
    }
}
