<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // DEBUG: Log session data
        \Log::info('CheckSuperAdmin Middleware', [
            'admin_id' => session('admin_id'),
            'admin_role' => session('admin_role'),
            'all_session' => session()->all()
        ]);

        if (!session('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu');
        }

        $admin = \App\Models\Admin::find(session('admin_id'));
        
        if (!$admin || $admin->role !== 'super_admin') {
            abort(403, 'Unauthorized - Super Admin access only. Session admin_id: ' . session('admin_id') . ', Role: ' . ($admin ? $admin->role : 'null'));
        }

        return $next($request);
    }
}
