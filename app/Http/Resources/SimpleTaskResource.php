<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
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
            'Estado' => new StatusResource(Status::find($this->status_id)),
        ];
    }
}
