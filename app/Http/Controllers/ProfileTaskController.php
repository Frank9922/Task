<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Mail\TareaAsignada;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProfileTaskController extends Controller
{
    public function index(){
        $user = Auth::user();
        return Inertia::render('ProfileTask', [
            'user'=> new UserResource($user),
        ]);
    }

    public function prueba(){
        $tasks = DB::table('tasks')
                    ->select('id', 'title', 'short_description', 'status_id', 'expiration')
                    ->where('user_id', '=', 9)
                    ->get();

        Mail::to('francoleiva990@mail.com', 'to')->send(new TareaAsignada('FrancoLeiva'));

        return Inertia::render('prueba', [
            'tasks' => $tasks
        ]);
    }
}
