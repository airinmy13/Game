<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">⭐ Admin Dashboard</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4">✏️ Edit Jadwal Les</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Siswa *</label>
                        <select name="student_id" class="form-select" required>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ $schedule->student_id == $student->id ? 'selected' : '' }}>
                                {{ $student->nama_anak }} (Kelas {{ $student->kelas }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Guru *</label>
                        <select name="teacher_id" class="form-select" required>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $schedule->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }} - {{ implode(', ', $teacher->subjects ?? []) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran *</label>
                        <input type="text" name="subject" class="form-control" required value="{{ $schedule->subject }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="schedule_date" class="form-control" required value="{{ \Carbon\Carbon::parse($schedule->schedule_date)->format('Y-m-d') }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Mulai *</label>
                            <input type="time" name="start_time" class="form-control" required value="{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Selesai *</label>
                            <input type="time" name="end_time" class="form-control" required value="{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
