<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
        .button { background: #667eea; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Selamat!</h1>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $teacher->name }}</strong>,</p>
            
            <p>Terima kasih telah mendaftar sebagai guru di <strong>Platform Game Edukasi Anak</strong>.</p>
            
            <p>Kami dengan senang hati menginformasikan bahwa akun Anda telah <strong>diaktifkan</strong>.</p>
            
            <div style="background: white; padding: 20px; border-left: 4px solid #667eea; margin: 20px 0;">
                <h3 style="margin-top: 0;">Informasi Login:</h3>
                <p><strong>Username:</strong> {{ $teacher->username }}<br>
                <strong>URL Login:</strong> <a href="{{ url('/admin/login') }}">{{ url('/admin/login') }}</a></p>
            </div>
            
            <p>Silakan login dan mulai membuat game edukatif untuk siswa!</p>
            
            <p>Jika ada pertanyaan, jangan ragu untuk menghubungi kami.</p>
            
            <p>Salam hangat,<br>
            <strong>Tim Platform Game Edukasi</strong></p>
        </div>
        <div class="footer">
            <p>Email ini dikirim otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
