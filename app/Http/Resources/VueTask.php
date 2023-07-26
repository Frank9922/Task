<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class VueTask extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return collect([
            'id' => $this->id,
            'titulo' => $this->title,
            'contenido' => $this->content,
            'descripcion_corta'=> $this->short_description,
            'creado' => Carbon::parse($this->created_at)->format('M d, Y H:i'),
            'actualizado' => Carbon::parse($this->updated_at)->format('M d, Y'),
            'expiracion' => Carbon::parse($this->expiration)->format('M d, Y'),
            'url' => 'http://task.test/task/'. $this->id ,
            'color' => $this->color,
            'Por'=> new UserResource(User::find($this->user_id)),
            'Estado' => new StatusResource(Status::find($this->status_id)),
        ])->toArray();
    }
}
