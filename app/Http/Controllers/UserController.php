<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function index(Request $request) : JsonResponse
    {
        $filters= [
            'id'=> 'filterById',
            'name'=> 'filterByName',
            'email'=> 'filterByEmail',
            'role'=> 'filterByRole',
        ];
        $llaves = [];
        $llaves = $request->all();
        if(empty($llaves)){
            return response()->json([
                'success'=>true,
                'filters'=> false,
                'data'=> UserResource::collection(User::all())
            ]);
        }
        else {
            $query = User::query();
            foreach($filters as $field => $method){
                if($request->has($field)){
                    $query = $this->$method($query, $request->input($field));
                }
            }
            $user = $query->get();
            return response()->json([
                'succes' => true,
                'filtrosActivos' => $request->all(),
                'data' => UserResource::collection($user)
            ]);
        }
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

    public function update(UserRequest $request, string $id)
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

    private function filterById($query, $value)
    {
        return $query->where('id', $value);
    }

    private function filterByName($query, $value)
    {
        return $query->where('name', 'like', '%'. $value. '%');
    }

    private function filterByEmail($query, $value)
    {
        return $query->where('email', 'like', '%'. $value. '%');
    }

    private function filterByRole($query, $value)
    {
        return $query->where('role_id', $value);
    }
}
