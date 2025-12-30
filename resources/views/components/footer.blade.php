<footer style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 40px 20px; margin-top: 60px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 30px;">
            <!-- About Section -->
            <div>
                <h3 style="margin-bottom: 15px; font-size: 18px;">🎮 Game Edukasi</h3>
                <p style="font-size: 14px; line-height: 1.6; opacity: 0.9;">
                    Platform pembelajaran interaktif untuk siswa dengan berbagai game edukatif yang menyenangkan.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 style="margin-bottom: 15px; font-size: 18px;">📌 Link Cepat</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('home') }}" style="color: white; text-decoration: none; opacity: 0.9; font-size: 14px; transition: opacity 0.3s;">
                            Beranda
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('games.index') }}" style="color: white; text-decoration: none; opacity: 0.9; font-size: 14px; transition: opacity 0.3s;">
                            Program
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('posters.index') }}" style="color: white; text-decoration: none; opacity: 0.9; font-size: 14px; transition: opacity 0.3s;">
                            Event & Kalender
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: white; text-decoration: none; opacity: 0.9; font-size: 14px; transition: opacity 0.3s;">
                            Blog
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: white; text-decoration: none; opacity: 0.9; font-size: 14px; transition: opacity 0.3s;">
                            Tentang
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 style="margin-bottom: 15px; font-size: 18px;">📞 Hubungi Kami</h3>
                <p style="font-size: 14px; line-height: 1.8; opacity: 0.9;">
                    📍 Desa Gajah, Bojonegoro, Jawa Timur<br>
                    📧 info@bimbelpados.com<br>
                    📱 +62 812-3456-7890
                </p>
            </div>
        </div>

        <!-- Copyright -->
        <div style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px; text-align: center;">
            <p style="margin: 0; font-size: 14px; opacity: 0.8;">
                &copy; 2026 Taman Belajar Sedjati. All rights reserved. | Belajar, Berkembang, Dan Berkarya Di Desa Gajah
            </p>
            <p style="margin: 10px 0 0 0; font-size: 12px; opacity: 0.7;">
                Made with ❤️ for Education
            </p>
        </div>
    </div>
</footer>

<style>
    footer a:hover {
        opacity: 1 !important;
        text-decoration: underline;
    }
</style>
