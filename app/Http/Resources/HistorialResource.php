<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Status;
use Carbon\Carbon;

class HistorialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'=> $this->id,
            'fecha_hora' => Carbon::parse($this->timestamp)->format('M d, Y H:i'),
            'estado_anterior' => Status::where('id', $this->estado_anterior_id)->pluck('name')->first(),
            'estado_posterior' => Status::where('id', $this->estado_posterior_id)->pluck('name')->first(),
        ];
    }
}
