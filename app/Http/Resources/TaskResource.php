<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Resources\StatusResource;
use App\Models\Status;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->title,
            'contenido' => $this->content,
            'creado' => Carbon::parse($this->created_at)->format('M d, Y H:i'),
            'actualizado' => Carbon::parse($this->updated_at)->format('M d, Y H:i'),
            'expiracion' => Carbon::parse($this->expiration)->format('M d, Y H:i'),
            'Asignado'=>new UserResource(User::find($this->user_id)),
            'Por'=> new UserResource(User::find($this->created_by)),
            'Estado' => new StatusResource(Status::find($this->status_id)),
        ];
    }
}
