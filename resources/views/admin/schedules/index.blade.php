<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">⭐ Admin Dashboard</a>
            <a href="{{ route('admin.logout') }}" class="btn btn-light btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📅 Kelola Jadwal Les</h2>
            <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">+ Tambah Jadwal</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->student->nama_anak }}</td>
                            <td>{{ $schedule->student->kelas }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->schedule_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</td>
                            <td><strong>{{ $schedule->subject }}</strong></td>
                            <td>{{ $schedule->mentor_name }}</td>
                            <td>
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center">Belum ada jadwal</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
