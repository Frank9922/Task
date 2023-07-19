<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Status;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'content',
            'expiration',
            'user_id',
            'status_id'
        ];

    public function user() : HasOne
        {
            return $this->hasOne(User::class, 'user_id', 'id');
        }
    public function status() : BelongsTo
        {
            return $this->belongsTo(Status::class, 'status_id', 'id');
        }

}
