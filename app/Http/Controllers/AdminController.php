<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(){
        return Inertia::render('AdminDashboard', [
            'estas' => 'sipa'
        ]);
    }

    public function create(){

    }

    public function storeTask(){

    }

    public function storeUser(){

    }
}
