<?php

use App\Http\Controllers\TaskInertia;
use App\Http\Controllers\ProfileTaskController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Models\Historial_estado;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/tasks', [TaskInertia::class, 'index'])->name('tasks');
    Route::get('/task/{id}', [TaskInertia::class, 'show'])->name('show');
    Route::get('/profile/mis-tareas', [ProfileTaskController::class, 'index'])->name('profile.tasks');
    Route::put('profile/mis-tareas/', [ProfileTaskController::class, 'updateStatus'])->name('profile.taskupdate');
    Route::middleware(['Admin'])->group(function () {
        Route::resource('/admin', AdminController::class);
        Route::get('/admin/task', [AdminController::class, 'showtask'])->name('admin.showtask');
    });
});
Route::get('/pruebaspapa', function (){
    $user_id = Task::select('user_id')->where('id', '=', 1);
    for($i=1; $i<=4; $i++){
        $count = $i+1;
        Historial_estado::create([
            'task_id' => 1,
            'user_id' => $user_id,
            'estado_anterior_id'=> $i,
            'estado_actual_id' => $count,
        ]);
    }
    return response()->json([
        'xd'=> $user_id
    ]);

});
