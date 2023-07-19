<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function index() : JsonResource
    {
        return UserResource::collection(User::all());
    }

    public function store(UserRequest $request) : JsonResponse
    {
        $user = User::create($request->all());
        return response()->json([
            'success' => true,
            'data' => new UserResource($user)
        ], 201);
    }

    public function show(string $id) : JsonResource
    {
        return new UserResource(User::find($id));
    }

    public function update(UserRequest $request, string $id) : JsonResponse
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            'success' => true,
            'data' => new UserResource($user)
        ], 201);
    }

    public function destroy(string $id) : JsonResponse
    {
        User::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => "Usuario $id borrado"
        ], 201);
    }
}
