<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;


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
            'Por'=> User::find($this->user_id)->name(),
            'actualizado' => Carbon::parse($this->updated_at)->format('M d, Y H:i'),
            'expiracion' => Carbon::parse($this->expiration)->format('M d, Y H:i'),

        ];
    }
}
