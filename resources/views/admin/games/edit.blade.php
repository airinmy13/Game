<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game - Admin</title>
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
        .current-thumbnail { max-width: 200px; border-radius: 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>✏️ Edit Game</h1>
        <div>
            <a href="{{ route('admin.games') }}">Kembali</a>
            @if(session('teacher_id'))
                <a href="{{ route('teacher.dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="card">
            <form action="{{ route('admin.games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="title">Nama Game *</label>
                    <input type="text" id="title" name="title" value="{{ $game->title }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description">{{ $game->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="subject">Mata Pelajaran *</label>
                    <select id="subject" name="subject" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        <option value="Matematika" {{ $game->subject == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                        <option value="Bahasa Indonesia" {{ $game->subject == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                        <option value="Bahasa Inggris" {{ $game->subject == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                        <option value="Bahasa Arab" {{ $game->subject == 'Bahasa Arab' ? 'selected' : '' }}>Bahasa Arab</option>
                        <option value="IPA (Sains)" {{ $game->subject == 'IPA (Sains)' ? 'selected' : '' }}>IPA (Sains)</option>
                        <option value="IPS (Sosial)" {{ $game->subject == 'IPS (Sosial)' ? 'selected' : '' }}>IPS (Sosial)</option>
                        <option value="Agama Islam" {{ $game->subject == 'Agama Islam' ? 'selected' : '' }}>Agama Islam</option>
                        <option value="Seni & Budaya" {{ $game->subject == 'Seni & Budaya' ? 'selected' : '' }}>Seni & Budaya</option>
                        <option value="Olahraga" {{ $game->subject == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="Lainnya" {{ $game->subject == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="grade_level">Untuk Kelas *</label>
                    <select id="grade_level" name="grade_level" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="Semua Kelas" {{ $game->grade_level == 'Semua Kelas' ? 'selected' : '' }}>Semua Kelas (Bahasa/Umum)</option>
                        <option value="Kelas 1" {{ $game->grade_level == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                        <option value="Kelas 2" {{ $game->grade_level == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                        <option value="Kelas 3" {{ $game->grade_level == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                        <option value="Kelas 4" {{ $game->grade_level == 'Kelas 4' ? 'selected' : '' }}>Kelas 4</option>
                        <option value="Kelas 5" {{ $game->grade_level == 'Kelas 5' ? 'selected' : '' }}>Kelas 5</option>
                        <option value="Kelas 6" {{ $game->grade_level == 'Kelas 6' ? 'selected' : '' }}>Kelas 6</option>
                        <option value="SMP" {{ $game->grade_level == 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA" {{ $game->grade_level == 'SMA' ? 'selected' : '' }}>SMA</option>
                    </select>
                    <small style="color: #666; display: block; margin-top: 5px;">Pilih "Semua Kelas" untuk game bahasa atau game yang bisa dimainkan semua tingkat</small>
                </div>

                <div class="form-group">
                    <label for="category">Kategori</label>
                    <input type="text" id="category" name="category" value="{{ $game->category }}">
                </div>

                <div class="form-group">
                    <label for="thumbnail">Gambar Thumbnail</label>
                    @if($game->thumbnail)
                        <img src="{{ asset($game->thumbnail) }}" alt="{{ $game->title }}" class="current-thumbnail">
                        <p style="color: #666; font-size: 12px; margin-top: 5px;">Upload gambar baru untuk mengganti</p>
                    @endif
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                </div>

                <hr style="margin: 30px 0; border: none; border-top: 2px solid #e0e0e0;">
                
                <h3 style="color: #667eea; margin-bottom: 15px;">🎨 Custom Game Template (Opsional)</h3>
                <p style="color: #666; margin-bottom: 20px; font-size: 14px;">
                    Masukkan kode HTML lengkap dengan CSS dan JavaScript untuk custom game template. Kode ini akan dirender sebagai halaman game.
                </p>

                <div class="form-group">
                    <label for="custom_template">Complete HTML/CSS/JS Code</label>
                    <textarea id="custom_template" name="custom_template" style="font-family: 'Courier New', monospace; min-height: 400px; font-size: 13px;" placeholder="<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS di sini */
    </style>
</head>
<body>
    <div class='game-container'>
        <h2>Judul Game</h2>
    </div>
    <script>
        // JavaScript di sini
    </script>
</body>
</html>">{{ $game->custom_template }}</textarea>
                    <small style="color: #666; display: block; margin-top: 5px;">
                        💡 Masukkan kode HTML lengkap termasuk &lt;style&gt; dan &lt;script&gt; tags
                    </small>
                </div>

                @if($game->game_images)
                    <div class="form-group">
                        <label>🖼️ Gambar yang Sudah Diupload:</label>
                        <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; margin-top: 10px;">
                            @foreach(json_decode($game->game_images) as $image)
                                <div style="margin-bottom: 10px; padding: 10px; background: white; border-radius: 5px;">
                                    <img src="{{ asset('images/game_assets/' . $game->id . '/' . $image) }}" 
                                         style="max-width: 100px; max-height: 100px; border-radius: 5px; margin-right: 10px;">
                                    <code style="background: #e9ecef; padding: 5px 10px; border-radius: 3px;">
                                        /images/game_assets/{{ $game->id }}/{{ $image }}
                                    </code>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label for="game_images">📸 Upload Gambar Baru (Multiple)</label>
                    <input type="file" id="game_images" name="game_images[]" accept="image/*" multiple>
                    <small style="color: #666; display: block; margin-top: 5px;">
                        💡 Upload gambar tambahan. Gambar lama tidak akan terhapus.
                    </small>
                </div>

                <hr style="margin: 30px 0; border: none; border-top: 2px solid #e0e0e0;">

                <div class="form-group">
                    <label for="order">Urutan Tampilan</label>
                    <input type="number" id="order" name="order" value="{{ $game->order }}" min="0">
                </div>

                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ $game->is_active ? 'checked' : '' }}>
                        <label for="is_active" style="margin: 0;">Aktifkan game ini</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Update Game</button>
                    <a href="{{ route('admin.games') }}" class="btn btn-secondary">Batal</a>
                </div>
                </div>
            </form>

            @if($game->use_template && $game->template)
                <hr style="margin: 40px 0; border: none; border-top: 2px solid #e0e0e0;">
                
                <h2 style="color: #667eea; margin-bottom: 20px;">📝 Kelola Soal</h2>
                <p style="color: #666; margin-bottom: 20px;">
                    Template: <strong>{{ $game->template->name }}</strong>
                </p>

                <div id="questions-list">
                    @forelse($game->gameQuestions as $index => $question)
                        <div class="question-item" style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 15px; position: relative;">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div style="flex: 1;">
                                    <strong style="color: #667eea;">Soal {{ $index + 1 }}</strong>
                                    <p style="margin: 10px 0 5px 0;"><strong>Pertanyaan:</strong> {{ $question->question_text }}</p>
                                    <p style="margin: 5px 0;"><strong>Jawaban:</strong> {{ $question->answer_text }}</p>
                                    @if($question->image_path)
                                        <p style="margin: 5px 0;"><strong>Gambar:</strong> <img src="{{ asset($question->image_path) }}" style="max-width: 100px; border-radius: 5px; margin-top: 5px;"></p>
                                    @endif
                                    <p style="margin: 5px 0; color: #10b981;"><strong>Poin:</strong> {{ $question->points }}</p>
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <button onclick="editQuestion({{ $question->id }})" class="btn btn-sm" style="background: #f59e0b; color: white; padding: 8px 15px; font-size: 12px;">Edit</button>
                                    <form action="{{ route('admin.questions.delete', $question->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus soal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background: #ef4444; color: white; padding: 8px 15px; font-size: 12px;">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; color: #999; padding: 40px;">Belum ada soal. Tambahkan soal pertama!</p>
                    @endforelse
                </div>

                <button onclick="showAddQuestionForm()" class="btn btn-primary" style="margin-top: 20px;">➕ Tambah Soal Baru</button>

                <!-- Add Question Form (Hidden by default) -->
                <div id="add-question-form" style="display: none; background: #f0f7ff; padding: 25px; border-radius: 10px; margin-top: 20px; border: 2px solid #667eea;">
                    <h3 style="color: #667eea; margin-bottom: 15px;">Tambah Soal Baru</h3>
                    <form action="{{ route('admin.questions.store', $game->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Pertanyaan / Kata Kiri</label>
                            <input type="text" name="question_text" required>
                        </div>
                        <div class="form-group">
                            <label>Jawaban / Kata Kanan</label>
                            <input type="text" name="answer_text" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar (Optional)</label>
                            <input type="file" name="image" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Poin</label>
                            <input type="number" name="points" value="10" min="1" required>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button type="submit" class="btn btn-primary">💾 Simpan Soal</button>
                            <button type="button" onclick="hideAddQuestionForm()" class="btn btn-secondary">Batal</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <script>
        function showAddQuestionForm() {
            document.getElementById('add-question-form').style.display = 'block';
        }
        function hideAddQuestionForm() {
            document.getElementById('add-question-form').style.display = 'none';
        }
        function editQuestion(id) {
            alert('Edit functionality coming soon! For now, please delete and create new question.');
        }
    </script>
</body>
</html>
