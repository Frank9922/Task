<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'nombre' => $this->name,
            'email' => $this->email,
            'photo_url'=> env('APP_URL').'/storage/'.$this->profile_photo_path,
            'creado' => Carbon::parse($this->created_at)->format('M d, Y'),
            'actualizado' => Carbon::parse($this->updated_at)->format('M d, Y')
        ];
    }
}
