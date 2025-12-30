<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['student', 'teacher'])->orderBy('schedule_date')->orderBy('start_time')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $students = Student::orderBy('nama_anak')->get();
        $teachers = Teacher::where('status', 'approved')->orderBy('name')->get();
        return view('admin.schedules.create', compact('students', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'subject' => 'required|string',
            'schedule_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Schedule::create([
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'subject' => $request->subject,
            'schedule_date' => $request->schedule_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'mentor_name' => Teacher::find($request->teacher_id)->name,
            'created_by_admin_id' => session('admin_id')
        ]);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $students = Student::orderBy('nama_anak')->get();
        $teachers = Teacher::where('status', 'approved')->orderBy('name')->get();
        return view('admin.schedules.edit', compact('schedule', 'students', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'subject' => 'required|string',
            'schedule_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule->update([
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'subject' => $request->subject,
            'schedule_date' => $request->schedule_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'mentor_name' => Teacher::find($request->teacher_id)->name,
        ]);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil diupdate!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil dihapus!');
    }
}
