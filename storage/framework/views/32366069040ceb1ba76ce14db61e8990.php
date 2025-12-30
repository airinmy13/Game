<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game - Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f7fa; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 800px; margin: 30px auto; padding: 0 20px; }
        .card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; color: #333; font-weight: 500; }
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 14px; font-family: inherit; }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus { outline: none; border-color: #667eea; }
        .form-group textarea { min-height: 100px; resize: vertical; }
        .form-actions { display: flex; gap: 10px; margin-top: 30px; }
        .btn { padding: 12px 30px; border-radius: 8px; text-decoration: none; font-size: 14px; border: none; cursor: pointer; transition: all 0.3s; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-secondary { background: #6b7280; color: white; }
        .btn:hover { transform: translateY(-2px); }
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
        .checkbox-group input[type="checkbox"] { width: auto; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>➕ Tambah Game Baru</h1>
        <div>
            <a href="<?php echo e(route('admin.games')); ?>">Kembali</a>
            <?php if(session('teacher_id')): ?>
                <a href="<?php echo e(route('teacher.dashboard')); ?>">Dashboard</a>
            <?php else: ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <form action="<?php echo e(route('admin.games.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <div class="form-group">
                    <label for="title">Nama Game *</label>
                    <input type="text" id="title" name="title" required placeholder="Contoh: Teka-Teki Silang">
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" placeholder="Jelaskan tentang game ini..."></textarea>
                </div>

                <div class="form-group">
                    <label for="subject">Mata Pelajaran *</label>
                    <select id="subject" name="subject" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                        <option value="Bahasa Arab">Bahasa Arab</option>
                        <option value="IPA (Sains)">IPA (Sains)</option>
                        <option value="IPS (Sosial)">IPS (Sosial)</option>
                        <option value="Agama Islam">Agama Islam</option>
                        <option value="Seni & Budaya">Seni & Budaya</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="grade_level">Untuk Kelas *</label>
                    <select id="grade_level" name="grade_level" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="Semua Kelas">Semua Kelas (Bahasa/Umum)</option>
                        <option value="Kelas 1">Kelas 1</option>
                        <option value="Kelas 2">Kelas 2</option>
                        <option value="Kelas 3">Kelas 3</option>
                        <option value="Kelas 4">Kelas 4</option>
                        <option value="Kelas 5">Kelas 5</option>
                        <option value="Kelas 6">Kelas 6</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                    <small style="color: #666; display: block; margin-top: 5px;">Pilih "Semua Kelas" untuk game bahasa atau game yang bisa dimainkan semua tingkat</small>
                </div>

                <div class="form-group">
                    <label for="category">Kategori</label>
                    <input type="text" id="category" name="category" placeholder="Contoh: Kosakata, Tata Bahasa, dll">
                </div>

                <div class="form-group">
                    <label for="thumbnail">Gambar Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                    <small style="color: #666; display: block; margin-top: 5px;">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                </div>

                <hr style="margin: 30px 0; border: none; border-top: 2px solid #e0e0e0;">
                
                <h3 style="color: #667eea; margin-bottom: 15px;">🎮 Pilih Cara Membuat Game</h3>
                
                <div class="form-group">
                    <label>
                        <input type="radio" name="game_mode" value="template" checked onchange="toggleGameMode()">
                        <strong>Gunakan Template</strong> (Mudah - Isi form saja, tanpa coding)
                    </label>
                    <br>
                    <label style="margin-top: 10px;">
                        <input type="radio" name="game_mode" value="custom" onchange="toggleGameMode()">
                        <strong>Custom Code</strong> (Advanced - Tulis HTML/CSS/JS sendiri)
                    </label>
                </div>

                <div id="template-section">
                    <div class="form-group">
                        <label for="template_id">Pilih Template Game</label>
                        <select id="template_id" name="template_id">
                            <option value="">-- Pilih Template --</option>
                            <?php $__currentLoopData = \App\Models\GameTemplate::where('is_active', true)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($template->id); ?>"><?php echo e($template->name); ?> - <?php echo e($template->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    
                    <div style="background: #f0f7ff; padding: 20px; border-radius: 10px; border-left: 4px solid #667eea; margin: 20px 0;">
                        <p style="margin: 0; color: #334155;">
                            <strong>📝 Cara Pakai:</strong><br>
                            1. Pilih template di atas<br>
                            2. Simpan game ini dulu<br>
                            3. Klik tombol "Edit" pada game yang baru dibuat<br>
                            4. Tambahkan soal-soal melalui form yang tersedia
                        </p>
                    </div>
                </div>

                <div id="custom-section" style="display: none;">
                    <h3 style="color: #667eea; margin-bottom: 15px;">🎨 Custom Game Template</h3>
                    <p style="color: #666; margin-bottom: 20px; font-size: 14px;">
                        Masukkan kode HTML lengkap dengan CSS dan JavaScript untuk custom game template.
                    </p>

                <div class="form-group">
                    <label for="custom_template">Complete HTML/CSS/JS Code</label>
                    <textarea id="custom_template" name="custom_template" style="font-family: 'Courier New', monospace; min-height: 400px; font-size: 13px;" placeholder="<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS di sini */
        .game-container {
            padding: 20px;
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class='game-container'>
        <h2>Judul Game</h2>
        <p>Konten game...</p>
    </div>
    
    <script>
        // JavaScript di sini
        console.log('Game loaded');
    </script>
</body>
</html>"></textarea>
                    <small style="color: #666; display: block; margin-top: 5px;">
                        💡 Masukkan kode HTML lengkap termasuk &lt;style&gt; dan &lt;script&gt; tags
                    </small>
                </div>

                <div class="form-group">
                    <label for="game_images">📸 Upload Gambar Game (Multiple)</label>
                    <input type="file" id="game_images" name="game_images[]" accept="image/*" multiple>
                    <small style="color: #666; display: block; margin-top: 5px;">
                        💡 Upload beberapa gambar sekaligus untuk dipakai di game. Nanti bisa diakses dengan:<br>
                        <code>&lt;img src="/images/game_assets/GAME_ID/namafile.jpg"&gt;</code>
                    </small>
                </div>
                </div>
                </div>

                <hr style="margin: 30px 0; border: none; border-top: 2px solid #e0e0e0;">

                <div class="form-group">
                    <label for="order">Urutan Tampilan</label>
                    <input type="number" id="order" name="order" value="0" min="0" placeholder="0">
                    <small style="color: #666; display: block; margin-top: 5px;">Semakin kecil angka, semakin di depan</small>
                </div>

                <div class="form-group">
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" name="is_active" value="1" checked>
                            <span>Game Aktif (Tampil di halaman game)</span>
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Simpan Game</button>
                    <a href="<?php echo e(route('admin.games')); ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleGameMode() {
            const mode = document.querySelector('input[name="game_mode"]:checked').value;
            const templateSection = document.getElementById('template-section');
            const customSection = document.getElementById('custom-section');
            
            if (mode === 'template') {
                templateSection.style.display = 'block';
                customSection.style.display = 'none';
                document.getElementById('template_id').required = true;
                document.getElementById('custom_template').required = false;
            } else {
                templateSection.style.display = 'none';
                customSection.style.display = 'block';
                document.getElementById('template_id').required = false;
                document.getElementById('custom_template').required = false;
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\Game\resources\views/admin/games/create.blade.php ENDPATH**/ ?>