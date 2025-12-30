<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f7fa; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 1200px; margin: 30px auto; padding: 0 20px; }
        .welcome { background: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: center; }
        .stat-card h3 { color: #667eea; font-size: 36px; margin-bottom: 10px; }
        .stat-card p { color: #666; }
        .quick-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }
        .link-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; text-decoration: none; transition: transform 0.3s; }
        .link-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>⭐ Super Admin Dashboard</h1>
        <div>
            <span>{{ $admin->name }}</span>
            <a href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="welcome">
            <h2>Selamat Datang, {{ $admin->name }}! 👑</h2>
            <p style="color: #666; margin-top: 10px;">Anda memiliki akses penuh ke semua fitur sistem</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>{{ $totalStudents }}</h3>
                <p>👨‍🎓 Siswa</p>
            </div>
            <div class="stat-card">
                <h3>{{ $totalParents }}</h3>
                <p>👨‍👩‍👧 Orang Tua</p>
            </div>
            <div class="stat-card">
                <h3>{{ $totalGames }}</h3>
                <p>🎮 Game</p>
            </div>
            <div class="stat-card">
                <h3>{{ $totalPosters }}</h3>
                <p>📚 Poster</p>
            </div>
            <div class="stat-card">
                <h3>{{ $totalTeachers }}</h3>
                <p>👨‍🏫 Guru</p>
            </div>
            <div class="stat-card">
                <h3>{{ $totalAdmins }}</h3>
                <p>👤 Admin</p>
            </div>
        </div>

        <h3 style="margin-bottom: 15px;">⚡ Management</h3>
        <div class="quick-links">
            <a href="{{ route('admin.games') }}" class="link-card">
                <div style="font-size: 36px; margin-bottom: 10px;">🎮</div>
                <div>Kelola Game</div>
            </a>
            <a href="{{ route('admin.students') }}" class="link-card">
                <div style="font-size: 36px; margin-bottom: 10px;">👨‍🎓</div>
                <div>Kelola Siswa</div>
            </a>
            <a href="{{ route('admin.parents') }}" class="link-card">
                <div style="font-size: 36px; margin-bottom: 10px;">👨‍👩‍👧</div>
                <div>Kelola Orang Tua</div>
            </a>
            <a href="{{ route('admin.posters') }}" class="link-card">
                <div style="font-size: 36px; margin-bottom: 10px;">📚</div>
                <div>Kelola Poster</div>
            </a>
            <a href="{{ route('super-admin.teachers.index') }}" class="link-card">
                <div style="font-size: 36px; margin-bottom: 10px;">👨‍🏫</div>
                <div>Kelola Guru</div>
            </a>
        </div>
    </div>
</body>
</html>
