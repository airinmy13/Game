<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameTemplate extends Model
{
    protected $fillable = [
        'name',
        'description',
        'template_file',
        'config_schema',
        'preview_image',
        'is_active'
    ];

    protected $casts = [
        'config_schema' => 'array',
        'is_active' => 'boolean'
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'template_id');
    }
}
