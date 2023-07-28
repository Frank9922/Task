<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Status;
use App\Models\Historial_estado;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function historial() : BelongsToMany
    {
            return $this->belongsToMany(Historial_estado::class, 'task_id', 'id');
    }
}
