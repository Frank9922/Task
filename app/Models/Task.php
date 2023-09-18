<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Status;
use App\Models\Historial_estado;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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

    public function user() : BelongsTo
        {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }

    public function userby() : BelongsTo
        {
            return $this->belongsTo(User::class, 'created_by', 'id');
        }

    public function status() : BelongsTo
        {
            return $this->belongsTo(Status::class, 'status_id', 'id');
        }

    public function historialEstados() : HasMany
        {
            return $this->hasMany(Historial_estado::class, 'task_id', 'id');
        }

    public function updateAndMakeHistorial($newStatus)
        {
            Historial_estado::create([
                'task_id' => $this->id,
                'user_id' => $this->user_id,
                'estado_anterior_id' => $this->status_id,
                'estado_posterior_id' => $newStatus,
                'timestamp' => now()
            ]);

            return DB::transaction(function () use ($newStatus) {
                $this->update(['status_id' => $newStatus]);
            });
        }
}
