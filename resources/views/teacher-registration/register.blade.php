<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Guru - Platform Game Edukasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; padding: 40px 0; }
        .register-card { max-width: 600px; margin: 0 auto; background: white; border-radius: 15px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .register-card h2 { color: #667eea; margin-bottom: 30px; text-align: center; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-card">
            <h2>👨‍🏫 Pendaftaran Guru</h2>
            
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('teacher.register.submit') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Username *</label>
                    <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
                    <small class="text-muted">Harus kombinasi huruf, angka, dan karakter khusus. Contoh: najwa_#123</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    <small class="text-muted">Email untuk menerima notifikasi approval</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password *</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password *</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran yang Diajar *</label>
                    <div class="mb-2">
                        <input type="checkbox" id="select_all" class="form-check-input">
                        <label for="select_all" class="form-check-label"><strong>Pilih Semua</strong></label>
                    </div>
                    <select name="subjects[]" id="subjects" class="form-select" multiple size="9" required>
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
                    <small class="text-muted">Tahan Ctrl untuk pilih lebih dari satu</small>
                </div>

                <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                <div class="text-center mt-3">
                    <a href="{{ route('home') }}" class="text-muted">Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('select_all').addEventListener('change', function() {
            const select = document.getElementById('subjects');
            for (let i = 0; i < select.options.length; i++) {
                select.options[i].selected = this.checked;
            }
        });
    </script>
</body>
</html>
