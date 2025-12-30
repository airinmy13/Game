<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameQuestion extends Model
{
    protected $fillable = [
        'game_id',
        'question_text',
        'answer_text',
        'options',
        'image_path',
        'points',
        'order'
    ];

    protected $casts = [
        'options' => 'array',
        'points' => 'integer',
        'order' => 'integer'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
