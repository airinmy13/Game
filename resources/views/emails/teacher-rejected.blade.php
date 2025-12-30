<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📧 Informasi Pendaftaran</h1>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $teacher->name }}</strong>,</p>
            
            <p>Terima kasih atas minat Anda untuk bergabung sebagai guru di <strong>Platform Game Edukasi Anak</strong>.</p>
            
            <p>Saat ini kami belum dapat memproses pendaftaran Anda karena beberapa pertimbangan internal.</p>
            
            <p>Anda dapat mendaftar kembali kapan saja melalui halaman pendaftaran kami.</p>
            
            <p>Jika Anda memiliki pertanyaan, silakan hubungi kami.</p>
            
            <p>Terima kasih atas pengertiannya.</p>
            
            <p>Salam,<br>
            <strong>Tim Platform Game Edukasi</strong></p>
        </div>
        <div class="footer">
            <p>Email ini dikirim otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
