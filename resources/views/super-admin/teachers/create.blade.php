<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>
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
        <h2>➕ Tambah Guru Baru</h2>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('super-admin.teachers.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username (untuk login) *</label>
                        <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
                        <small class="text-muted">Username unik untuk login, contoh: pakbudi, buani, dll</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password *</label>
                        <input type="password" name="password" class="form-control" required>
                        <small class="text-muted">Minimal 6 karakter</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
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
                            <option value="Matematika">Matematika</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Bahasa Arab">Bahasa Arab</option>
                            <option value="IPA (Sains)">IPA (Sains)</option>
                            <option value="IPS (Sosial)">IPS (Sosial)</option>
                            <option value="Agama Islam">Agama Islam</option>
                            <option value="Seni & Budaya">Seni & Budaya</option>
                            <option value="Olahraga">Olahraga</option>
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

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('super-admin.teachers.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
