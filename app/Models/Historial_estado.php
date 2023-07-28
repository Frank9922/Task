<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_estado extends Model
{
    use HasFactory;

    public $timestamps= false;

    protected $fillable = ['task_id', 'user_id', 'timestamp', 'estado_anterior_id', 'estado_actual_id'];
}
