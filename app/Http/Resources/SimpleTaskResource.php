<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use App\Models\Historial_estado;
use App\Http\Resources\HistorialResource;
use App\Models\User;
use App\Models\Status;

class SimpleTaskResource extends JsonResource
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
            'expiracion' => Carbon::parse($this->expiration)->format('M d, Y'),
            'status_id' => $this->status_id,
            'Estado' => new StatusResource(Status::find($this->status_id)),
        ];
    }
}
