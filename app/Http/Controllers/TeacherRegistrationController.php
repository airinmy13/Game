<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherRegistrationController extends Controller
{
    public function showForm()
    {
        return view('teacher-registration.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'unique:teachers,username',
                'max:50',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*#?&_-])[A-Za-z\d@$!%*#?&_-]+$/',
                'different:password'
            ],
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable|string',
            'subjects' => 'required|array|min:1'
        ], [
            'username.regex' => 'Username harus mengandung huruf, angka, dan karakter khusus (contoh: najwa_#123)',
            'username.different' => 'Username dan password tidak boleh sama',
            'subjects.required' => 'Pilih minimal 1 mata pelajaran',
            'subjects.min' => 'Pilih minimal 1 mata pelajaran'
        ]);

        Teacher::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'subjects' => $request->subjects,
            'is_active' => true,
            'status' => 'pending' // Menunggu approval
        ]);

        return redirect()->route('teacher.register.success')
            ->with('registered_email', $request->email);
    }

    public function success()
    {
        if (!session('registered_email')) {
            return redirect()->route('teacher.register.form');
        }
        
        return view('teacher-registration.success');
    }
}
