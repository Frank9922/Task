<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Status;
use App\Models\Historial_estado;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'content',
            'expiration',
            'user_id',
            'status_id',
            'short_description',
            'color',
            'created_by',
        ];

    public function user() : HasOne
        {
            return $this->hasOne(User::class, 'user_id', 'id');
        }

    public function userby() : HasOne
        {
            return $this->hasOne(User::class, 'created_by', 'id');
        }

    public function status() : BelongsTo
        {
            return $this->belongsTo(Status::class, 'status_id', 'id');
        }

    public function historialEstados() : HasMany
        {
            return $this->hasMany(Historial_estado::class, 'task_id', 'id');
        }

    public function updateAndMakeHistorial($newStatus, $taskId)
        {
            $task = Task::where('id', $taskId)->first();
            //dd($task->id, $task->status_id,$newStatus, $task->user_id);
            $this->update(['status_id' => $newStatus]);

            Historial_estado::create([
                'task_id' => $task->id,
                'user_id' => $task->user_id,
                'estado_anterior_id' => $task->status_id,
                'estado_posterior_id' => $newStatus,
                'timestamp' => now()
            ]);
        }
}
