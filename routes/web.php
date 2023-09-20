<?php

use App\Http\Controllers\TaskInertia;
use App\Http\Controllers\ProfileTaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicUserController;
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
    Route::get('/users', [PublicUserController::class, 'index'])->name('public.users.index');
    Route::get('/user/{id}', [PublicUserController::class, 'showUser'])->name('public.user.show');
    Route::middleware(['Admin'])->group(function () {
        Route::resource('/admin', AdminController::class);
        Route::get('/admin/task', [AdminController::class, 'showtask'])->name('admin.showtask');
    });
});
