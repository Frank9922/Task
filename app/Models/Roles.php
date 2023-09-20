<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;

class Roles extends Model
{
    use HasFactory;

    public $fillable = [
        'name'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];


    public function user() : HasOne{
        return $this->hasOne(User::class, 'id', 'role_id');
    }
}
