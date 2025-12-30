<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'subjects',
        'is_active',
        'status'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'subjects' => 'array',
        'is_active' => 'boolean',
        'status' => 'string'
    ];
}
