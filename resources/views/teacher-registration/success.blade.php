<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - Platform Game Edukasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .success-card { max-width: 600px; background: white; border-radius: 20px; padding: 50px 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); text-align: center; }
        .success-icon { font-size: 80px; color: #28a745; margin-bottom: 20px; animation: bounce 1s ease; }
        @keyframes bounce { 0%, 20%, 50%, 80%, 100% { transform: translateY(0); } 40% { transform: translateY(-20px); } 60% { transform: translateY(-10px); } }
        h1 { color: #667eea; margin-bottom: 20px; }
        .info-box { background: #f8f9fa; border-left: 4px solid #667eea; padding: 20px; margin: 30px 0; text-align: left; border-radius: 5px; }
        .btn-home { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px 40px; border-radius: 25px; text-decoration: none; display: inline-block; margin-top: 20px; }
        .btn-home:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4); color: white; }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-icon">✅</div>
        <h1>Pendaftaran Berhasil!</h1>
        <p class="lead">Terima kasih telah mendaftar sebagai guru di Platform Game Edukasi Anak.</p>
        
        <div class="info-box">
            <h5>📧 Langkah Selanjutnya:</h5>
            <ol style="margin-bottom: 0; padding-left: 20px;">
                <li>Data Anda telah terkirim ke admin</li>
                <li>Admin akan meninjau pendaftaran Anda</li>
                <li><strong>Notifikasi akan dikirim ke email Anda</strong></li>
                <li>Silakan cek email secara berkala</li>
            </ol>
        </div>

        <div class="alert alert-info">
            <strong>💡 Tips:</strong> Cek folder Spam/Junk jika email tidak masuk ke Inbox
        </div>

        <p class="text-muted mb-0">Email yang Anda daftarkan:</p>
        <p class="fw-bold fs-5">{{ session('registered_email') }}</p>

        <a href="{{ route('home') }}" class="btn-home">Kembali ke Beranda</a>
    </div>
</body>
</html>
