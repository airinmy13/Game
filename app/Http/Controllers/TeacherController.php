<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameQuestion;
use App\Models\GameTemplate;

class TeacherController extends Controller
{
    public function dashboard()
    {
        if (!session('teacher_id')) {
            return redirect()->route('admin.login');
        }

        $teacher = \App\Models\Teacher::find(session('teacher_id'));
        
        // Get statistics for THIS teacher only
        $myGames = Game::where('created_by_teacher_id', session('teacher_id'))->get();
        $totalGames = $myGames->count();
        $totalQuestions = GameQuestion::whereIn('game_id', $myGames->pluck('id'))->count();
        $totalTemplates = GameTemplate::where('is_active', true)->count();
        
        // Recent games from THIS teacher
        $recentGames = Game::where('created_by_teacher_id', session('teacher_id'))
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get student analytics for teacher's games
        $gameAnalytics = [];
        foreach ($myGames as $game) {
            $sessions = \App\Models\GameSession::with(['student.orangTua'])
                ->where('game_id', $game->id)
                ->where('completed_at', '!=', null)
                ->orderBy('completed_at', 'desc')
                ->get();
            
            if ($sessions->count() > 0) {
                $gameAnalytics[] = [
                    'game' => $game,
                    'sessions' => $sessions
                ];
            }
        }

        return view('teacher.dashboard', compact(
            'teacher',
            'totalGames',
            'totalQuestions',
            'totalTemplates',
            'recentGames',
            'gameAnalytics'
        ));
    }
}
