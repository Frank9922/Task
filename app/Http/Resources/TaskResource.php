<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Resources\StatusResource;
use App\Models\Historial_estado;
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
        $historialCollection = Historial_estado::where('task_id', $this->id)->get();
        $name= User::where('id', $this->user_id)->first()->name;

        $historialResource = $historialCollection->map(function ($historial){
            return new HistorialResource($historial);
        });

        return [
            'id' => $this->id,
            'titulo' => $this->title,
            'titulo_page' => $this->title.' - '.$name,
            'contenido' => $this->content,
            'descripcion_corta' => $this->short_description,
            'creado' => Carbon::parse($this->created_at)->format('M d, Y H:i'),
            'actualizado' => Carbon::parse($this->updated_at)->format('M d, Y H:i'),
            'expiracion' => Carbon::parse($this->expiration)->format('M d, Y H:i'),
            'Asignado'=>new UserResource(User::find($this->user_id)),
            'url' => env('APP_URL'). '/task/'.$this->id,
            'color'=> $this->color,
            'Por'=> new UserResource(User::find($this->created_by)),
            'Estado' => new StatusResource(Status::find($this->status_id)),
            'Historial'=>$historialResource
        ];
    }
}
