<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f7fa; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 1200px; margin: 30px auto; padding: 0 20px; }
        .welcome { background: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .stat-card h3 { color: #667eea; font-size: 36px; margin-bottom: 10px; }
        .stat-card p { color: #666; }
        .quick-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }
        .link-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; text-decoration: none; transition: transform 0.3s; }
        .link-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>👨‍🏫 Teacher Dashboard</h1>
        <div>
            <span>{{ $teacher->name }}</span>
            <a href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="welcome">
            <h2>Selamat Datang, {{ $teacher->name }}! 👋</h2>
            <p style="color: #666; margin-top: 10px;">Kelola game edukasi untuk siswa</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>{{ $totalGames }}</h3>
                <p>Total Game</p>
            </div>
            <div class="stat-card">
                <h3>{{ $totalQuestions }}</h3>
                <p>Total Soal</p>
            </div>
            <div class="stat-card">
                <h3>{{ $totalTemplates }}</h3>
                <p>Template Tersedia</p>
            </div>
        </div>

        <h3 style="margin-bottom: 15px;">⚡ Quick Actions</h3>
        <div class="quick-links">
            <a href="{{ route('admin.games') }}" class="link-card">
                <div style="font-size: 36px; margin-bottom: 10px;">🎮</div>
                <div>Kelola Game</div>
            </a>
            <a href="{{ route('admin.games.create') }}" class="link-card">
                <div style="font-size: 36px; margin-bottom: 10px;">➕</div>
                <div>Buat Game Baru</div>
            </a>
        </div>

        {{-- Student Analytics Section --}}
        @if(count($gameAnalytics) > 0)
        <h3 style="margin: 40px 0 20px 0;">📊 Statistik Siswa yang Memainkan Game Anda</h3>
        
        @foreach($gameAnalytics as $analytics)
        <div style="background: white; padding: 25px; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <h4 style="color: #667eea; margin-bottom: 20px;">🎮 {{ $analytics['game']->title }}</h4>
            
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f5f7fa;">
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Nama Siswa</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Kelas</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Orang Tua</th>
                        <th style="padding: 12px; text-align: center; border-bottom: 2px solid #e5e7eb;">Skor</th>
                        <th style="padding: 12px; text-align: center; border-bottom: 2px solid #e5e7eb;">Tanggal Main</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($analytics['sessions'] as $session)
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 12px;">{{ $session->student->nama_anak }}</td>
                        <td style="padding: 12px;">{{ $session->student->kelas }}</td>
                        <td style="padding: 12px;">{{ $session->student->orangTua->parent_name ?? '-' }}</td>
                        <td style="padding: 12px; text-align: center;">
                            <strong style="color: #667eea;">{{ $session->total_score }} poin</strong>
                        </td>
                        <td style="padding: 12px; text-align: center;">
                            {{ \Carbon\Carbon::parse($session->completed_at)->format('d M Y, H:i') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <p style="margin-top: 15px; color: #666; font-size: 14px;">
                Total: <strong>{{ $analytics['sessions']->count() }}</strong> siswa telah memainkan game ini
            </p>
        </div>
        @endforeach
        @else
        <div style="background: white; padding: 40px; border-radius: 15px; margin-top: 40px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <div style="font-size: 48px; margin-bottom: 15px;">📊</div>
            <h4 style="color: #666;">Belum Ada Siswa yang Memainkan Game Anda</h4>
            <p style="color: #999; margin-top: 10px;">Buat game baru dan tunggu siswa memainkannya!</p>
        </div>
        @endif
    </div>
</body>
</html>
