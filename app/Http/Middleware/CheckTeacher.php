<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTeacher
{
    public function handle(Request $request, Closure $next)
    {
        // Check if logged in as teacher
        if (session('teacher_id')) {
            return $next($request);
        }

        // Or logged in as admin/super_admin (they can access teacher features too)
        if (session('admin_id')) {
            $admin = \App\Models\User::find(session('admin_id'));
            if ($admin && in_array($admin->role, ['super_admin', 'admin'])) {
                return $next($request);
            }
        }

        return redirect()->route('admin.login')->with('error', 'Akses ditolak');
    }
}
