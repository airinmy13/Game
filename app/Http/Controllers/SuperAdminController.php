<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\OrangTua;
use App\Models\Game;
use App\Models\Poster;
use App\Models\Teacher;
use App\Models\Admin;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $admin = Admin::find(session('admin_id'));
        
        if ($admin->role !== 'super_admin') {
            abort(403, 'Unauthorized');
        }

        // Get all statistics
        $totalStudents = Student::count();
        $totalParents = OrangTua::count();
        $totalGames = Game::count();
        $totalPosters = Poster::count();
        $totalTeachers = Teacher::count();
        $totalAdmins = Admin::count();

        return view('super-admin.dashboard', compact(
            'admin',
            'totalStudents',
            'totalParents',
            'totalGames',
            'totalPosters',
            'totalTeachers',
            'totalAdmins'
        ));
    }
}
