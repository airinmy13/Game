<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'subject',
        'grade_level',
        'created_by_teacher_id',
        'thumbnail',
        'html_template',
        'css_style',
        'js_code',
        'custom_template',
        'game_images',
        'template_id',
        'use_template',
        'category',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Relasi ke questions
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Relasi ke game sessions
     */
    public function sessions()
    {
        return $this->hasMany(GameSession::class);
    }

    /**
     * Relasi ke game template
     */
    public function template()
    {
        return $this->belongsTo(GameTemplate::class, 'template_id');
    }

    /**
     * Relasi ke game questions (template-based)
     */
    public function gameQuestions()
    {
        return $this->hasMany(GameQuestion::class)->orderBy('order');
    }

    /**
     * Get active questions only
     */
    public function activeQuestions()
    {
        return $this->hasMany(Question::class)->where('is_active', true);
    }

    /**
     * Relasi ke teacher yang membuat game
     */
    public function createdByTeacher()
    {
        return $this->belongsTo(Teacher::class, 'created_by_teacher_id');
    }
}
