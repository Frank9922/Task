<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;

class ExampleController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Inertia::render('ExampleInertia', ['users' => $users]);
    }
}
