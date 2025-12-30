<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">⭐ Admin Dashboard</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4">➕ Tambah Jadwal Les</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.schedules.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Siswa *</label>
                        <select name="student_id" class="form-select" required>
                            <option value="">Pilih Siswa</option>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->nama_anak }} (Kelas {{ $student->kelas }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Guru *</label>
                        <select name="teacher_id" class="form-select" required>
                            <option value="">Pilih Guru</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }} - {{ implode(', ', $teacher->subjects ?? []) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran *</label>
                        <input type="text" name="subject" class="form-control" required placeholder="Contoh: Matematika">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="schedule_date" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Mulai *</label>
                            <input type="time" name="start_time" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Selesai *</label>
                            <input type="time" name="end_time" class="form-control" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
