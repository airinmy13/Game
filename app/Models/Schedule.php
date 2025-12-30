<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'student_id',
        'teacher_id',
        'schedule_date',
        'start_time',
        'end_time',
        'subject',
        'mentor_name',
        'location',
        'status',
        'notes',
        'attendance',
        'created_by_admin_id'
    ];

    protected $casts = [
        'schedule_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'attendance' => 'boolean'
    ];

    /**
     * Relationship to Student
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relationship to Teacher
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Relationship to Admin who created
     */
    public function createdByAdmin()
    {
        return $this->belongsTo(\App\Models\Admin::class, 'created_by_admin_id');
    }

    /**
     * Scope untuk jadwal hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('schedule_date', today());
    }

    /**
     * Scope untuk jadwal minggu ini
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('schedule_date', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    /**
     * Scope untuk jadwal bulan ini
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('schedule_date', now()->month)
                     ->whereYear('schedule_date', now()->year);
    }

    /**
     * Scope untuk jadwal yang akan datang
     */
    public function scopeUpcoming($query)
    {
        return $query->where('schedule_date', '>=', today())
                     ->orderBy('schedule_date')
                     ->orderBy('start_time');
    }
}
