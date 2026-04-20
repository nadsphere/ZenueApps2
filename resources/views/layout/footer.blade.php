<!-- Footer -->
<footer id="footer" class="footer-dark">
    <div class="footer-top">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="mb-3">
                        <img src="{{ asset('img/zenue.svg') }}" alt="Zenith" style="height: 40px; filter: brightness(0) invert(1);">
                    </div>
                    <p class="footer-description mb-4">
                        Platform terpercaya untuk menemukan Event Organizer profesional. Wujudkan acara impian Anda bersama kami.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook"><i class="fa fa-facebook-f"></i></a>
                        <a href="#" class="social-link" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="social-link" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="social-link" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                    <h5 class="footer-heading text-white">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="footer-link">Beranda</a></li>
                        <li><a href="#" class="footer-link">Tentang Kami</a></li>
                        <li><a href="#services" class="footer-link">Layanan</a></li>
                        <li><a href="#" class="footer-link">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                    <h5 class="footer-heading text-white">Tentang Zenue</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Tentang Kami</a></li>
                        <li><a href="#" class="footer-link">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="footer-link">Kebijakan Privasi</a></li>
                        <li><a href="#" class="footer-link">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h5 class="footer-heading text-white">Bantuan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Pusat Bantuan</a></li>
                        <li><a href="#" class="footer-link">Cara Pemesanan</a></li>
                        <li><a href="#" class="footer-link">Hubungi Kami</a></li>
                        <li><a href="#" class="footer-link">Garansi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="copyrights">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left mb-2 mb-md-0">
                    <p class="copyrights-txt text-white mb-0">&copy; {{ date('Y') }} Zenith EO. Hak Cipta Dilindungi</p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="copyrights-txt text-white mb-0" style="font-size: 12px;">
                        Dibuat dengan <i class="fa fa-heart" style="color: #e74c3c;"></i> untuk Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
@stack('scripts')
</body>
</html>
