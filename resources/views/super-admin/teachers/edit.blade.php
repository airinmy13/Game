<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('super-admin.dashboard') }}">⭐ Super Admin</a>
            <a href="{{ route('super-admin.teachers.index') }}" class="btn btn-light btn-sm">Kembali</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>✏️ Edit Guru</h2>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('super-admin.teachers.update', $teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" name="name" class="form-control" required value="{{ $teacher->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username *</label>
                        <input type="text" name="username" class="form-control" required value="{{ $teacher->username }}">
                        <small class="text-muted">Username unik untuk login</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" required value="{{ $teacher->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ $teacher->phone }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <div class="mb-2">
                            <input type="checkbox" id="select_all_subjects" class="form-check-input">
                            <label for="select_all_subjects" class="form-check-label">
                                <strong>Pilih Semua Mata Pelajaran</strong>
                            </label>
                        </div>
                        <select name="subjects[]" id="subjects" class="form-select" multiple size="10">
                            <option value="Matematika" {{ in_array('Matematika', $teacher->subjects ?? []) ? 'selected' : '' }}>Matematika</option>
                            <option value="Bahasa Indonesia" {{ in_array('Bahasa Indonesia', $teacher->subjects ?? []) ? 'selected' : '' }}>Bahasa Indonesia</option>
                            <option value="Bahasa Inggris" {{ in_array('Bahasa Inggris', $teacher->subjects ?? []) ? 'selected' : '' }}>Bahasa Inggris</option>
                            <option value="Bahasa Arab" {{ in_array('Bahasa Arab', $teacher->subjects ?? []) ? 'selected' : '' }}>Bahasa Arab</option>
                            <option value="IPA (Sains)" {{ in_array('IPA (Sains)', $teacher->subjects ?? []) ? 'selected' : '' }}>IPA (Sains)</option>
                            <option value="IPS (Sosial)" {{ in_array('IPS (Sosial)', $teacher->subjects ?? []) ? 'selected' : '' }}>IPS (Sosial)</option>
                            <option value="Agama Islam" {{ in_array('Agama Islam', $teacher->subjects ?? []) ? 'selected' : '' }}>Agama Islam</option>
                            <option value="Seni & Budaya" {{ in_array('Seni & Budaya', $teacher->subjects ?? []) ? 'selected' : '' }}>Seni & Budaya</option>
                            <option value="Olahraga" {{ in_array('Olahraga', $teacher->subjects ?? []) ? 'selected' : '' }}>Olahraga</option>
                        </select>
                        <small class="text-muted">Tahan Ctrl untuk pilih lebih dari satu, atau centang "Pilih Semua" di atas</small>
                    </div>

                    <script>
                        document.getElementById('select_all_subjects').addEventListener('change', function() {
                            const select = document.getElementById('subjects');
                            const options = select.options;
                            for (let i = 0; i < options.length; i++) {
                                options[i].selected = this.checked;
                            }
                        });
                    </script>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $teacher->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Aktif</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('super-admin.teachers.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
