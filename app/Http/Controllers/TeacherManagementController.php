<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherManagementController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('super-admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('super-admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:teachers,username|max:50|different:password',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string',
            'subjects' => 'nullable|array'
        ], [
            'username.different' => 'Username dan password tidak boleh sama'
        ]);

        Teacher::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'subjects' => $request->subjects ?? [],
            'is_active' => true
        ]);

        return redirect()->route('super-admin.teachers.index')
            ->with('success', 'Guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('super-admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:teachers,username,' . $id . '|max:50' . ($request->filled('password') ? '|different:password' : ''),
            'email' => 'required|email|unique:teachers,email,' . $id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable|string',
            'subjects' => 'nullable|array'
        ], [
            'username.different' => 'Username dan password tidak boleh sama'
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'subjects' => $request->subjects ?? [],
            'is_active' => $request->has('is_active')
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $teacher->update($data);

        return redirect()->route('super-admin.teachers.index')
            ->with('success', 'Guru berhasil diupdate!');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('super-admin.teachers.index')
            ->with('success', 'Guru berhasil dihapus!');
    }

    public function approve($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update(['status' => 'approved']);

        // Send approval email
        try {
            \Mail::to($teacher->email)->send(new \App\Mail\TeacherApproved($teacher));
        } catch (\Exception $e) {
            // Log error but don't fail the approval
            \Log::error('Failed to send approval email: ' . $e->getMessage());
        }

        return redirect()->route('super-admin.teachers.index')
            ->with('success', 'Guru berhasil disetujui! Email notifikasi telah dikirim.');
    }

    public function reject($id)
    {
        $teacher = Teacher::findOrFail($id);
        
        // Send rejection email before deleting
        try {
            \Mail::to($teacher->email)->send(new \App\Mail\TeacherRejected($teacher));
        } catch (\Exception $e) {
            \Log::error('Failed to send rejection email: ' . $e->getMessage());
        }

        // Update status to rejected (keep for record)
        $teacher->update(['status' => 'rejected']);

        return redirect()->route('super-admin.teachers.index')
            ->with('success', 'Pendaftaran guru ditolak. Email notifikasi telah dikirim.');
    }
}
