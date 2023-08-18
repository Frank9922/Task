<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historial_estado extends Model
{
    use HasFactory;

    public $timestamps= false;

    protected $fillable = ['task_id', 'user_id', 'timestamp', 'estado_anterior_id', 'estado_posterior_id'];

    public function task() : BelongsTo
        {
            return $this->belongsTo(Task::class, 'task_id');
        }

    public function estadoAnterior(): BelongsTo
        {
            return $this->belongsTo(Status::class, 'estado_anterior_id');
        }

    public function estadoPosterior(): BelongsTo
        {
            return $this->belongsTo(Status::class, 'estado_posterior_id');
        }
}
