<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Status;

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
    public function status() :  HasOne
        {
            return $this->HasOne(Status::class, 'id', 'status_id');
        }

}
