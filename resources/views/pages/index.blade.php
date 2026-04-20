@extends('layout.app')
@section('body_class', 'is-home')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/index-slider-inline.js') }}"></script>
@endpush

<!-- Hero Section -->
<section id="intro">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 col-md-12 intro-info order-lg-first order-last order-sm-first mb-5 mb-lg-0">
                <h2 class="mb-4">Buat Acaramu<br><span class="gradient-text">Mudah & Keren!</span></h2>
                <p class="mb-4">Temukan layanan organizer untuk berbagai acara di lokasi terdekat Anda dan dapatkan rekomendasi menarik lainnya.</p>
                <div class="d-flex flex-wrap gap-3">
                    @if(!Auth::guard('users')->check())
                        <a href="{{ url('/register') }}" class="btn-get-started">Daftar Sekarang</a>
                    @else
                        <a href="{{ url('/paket') }}" class="btn-get-started">Lihat Paket</a>
                    @endif
                    <a href="#services" class="btn-services scrollto">Lihat Layanan</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 intro-img order-lg-last order-first text-center mb-5 mb-lg-0">
                <img src="{{ asset('img/bn-img.png') }}" alt="Zenith Event Organizer" class="img-fluid" style="max-height: 420px; filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3));">
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section id="services" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <header class="section-header">
                <h3>Kategori Layanan</h3>
            </header>
        </div>
        <div class="row text-center justify-content-center">
            @php
            $categories = [
                ['icon' => 'ico-04.svg', 'name' => 'Concert'],
                ['icon' => 'ico-03.svg', 'name' => 'Party'],
                ['icon' => 'ico-01.svg', 'name' => 'Wedding'],
                ['icon' => 'ico-02.svg', 'name' => 'Conference'],
                ['icon' => 'ico-06.svg', 'name' => 'Rental'],
                ['icon' => 'ico-05.svg', 'name' => 'Catering'],
            ];
            @endphp
            @foreach($categories as $cat)
            <div class="col-6 col-md-4 col-lg-2 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="box">
                        <div class="icon mx-auto mb-3">
                            <img src="{{ asset('img/icon/' . $cat['icon']) }}" alt="{{ $cat['name'] }}" style="width: 48px; height: 48px;">
                        </div>
                        <h4 class="title">{{ $cat['name'] }}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Best EO Section -->
<section class="bg-gray py-5">
    <div class="container">
        <header class="section-header text-center mb-5">
            <h3>EO Terbaik</h3>
        </header>

        <!-- Custom EO Slider -->
        <div class="eo-slider-wrapper">
            <!-- Prev Button -->
            <button class="eo-slider-btn eo-slider-prev" id="eoSliderPrev" aria-label="Previous">
                <i class="fa fa-chevron-left"></i>
            </button>

            <!-- Clipper (overflow:hidden clips sliding cards) -->
            <div class="eo-slider-clip">
            <!-- Slider Track -->
            <div class="eo-slider-track" id="eoSliderTrack">
                @php
                $eos = [
                    ['name' => 'Parama Creative', 'location' => 'Jakarta Pusat', 'image' => 'img/EO/eo-1.png'],
                    ['name' => 'Moment n Co.', 'location' => 'Jakarta Timur', 'image' => 'img/EO/eo-3.jpg'],
                    ['name' => 'FUN Party', 'location' => 'Jakarta Timur', 'image' => 'img/EO/eo-4.jpg'],
                    ['name' => 'MAM EO', 'location' => 'Jakarta Timur', 'image' => 'img/EO/mama.jpg'],
                    ['name' => 'Elite Events', 'location' => 'Jakarta Selatan', 'image' => 'img/EO/eo-1.png'],
                ];
                @endphp
                @foreach($eos as $eo)
                <div class="eo-card-item">
                    <div class="thumb-wrappers h-100">
                        <div class="img-box text-center py-3">
                            <img src="{{ asset($eo['image']) }}" class="img-fluid img-rd" alt="{{ $eo['name'] }}" style="height: 100px; width: 100px; object-fit: cover;">
                        </div>
                        <div class="thumb-content text-center">
                            <h4 class="mb-2">{{ $eo['name'] }}</h4>
                            <div class="star-rating mb-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-o text-warning"></i>
                            </div>
                            <p class="item-price mb-3">
                                <i class="fa fa-map-marker text-muted"></i> <strong>{{ $eo['location'] }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div><!-- end .eo-slider-clip -->

            <!-- Next Button -->
            <button class="eo-slider-btn eo-slider-next" id="eoSliderNext" aria-label="Next">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>

        <!-- Dots -->
        <div class="eo-slider-dots" id="eoSliderDots"></div>
    </div>
</section>

<!-- Why Us Section -->
<section id="why-us" class="bg-gray py-5">
    <div class="container">
        <header class="section-header text-center mb-5">
            <h3>Kenapa Memilih Zenith?</h3>
        </header>
        <div class="why-us-content row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="features text-center p-4 h-100">
                    <i class="fa fa-users fa-3x mb-3" style="color: var(--zenith-primary);"></i>
                    <h4 class="mb-3">EO Berpengalaman</h4>
                    <p class="text-muted mb-0">Berasal dari EO profesional dan berpengalaman yang siap melayani Anda dengan penuh dedikasi</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="features text-center p-4 h-100">
                    <i class="fa fa-rocket fa-3x mb-3" style="color: var(--zenith-primary);"></i>
                    <h4 class="mb-3">Mudah &amp; Cepat</h4>
                    <p class="text-muted mb-0">Beragam layanan berkualitas dengan proses pemesanan yang simpel dan responsif</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="features text-center p-4 h-100">
                    <i class="fa fa-shield fa-3x mb-3" style="color: var(--zenith-primary);"></i>
                    <h4 class="mb-3">Aman &amp; Terpercaya</h4>
                    <p class="text-muted mb-0">Pembayaran dan negosiasi dijamin aman dari EO terpercaya</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="call-to-action" class="no-gap">
    <div class="cta-wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h3 class="cta-title mb-3">Buka Event Organizer Anda Sekarang!</h3>
                    <p class="cta-text mb-0">Yuk gabung bersama kami untuk mewujudkan peluang bisnis yang tinggi dan jangkau lebih banyak klien.</p>
                </div>
                <div class="col-lg-4 text-lg-right text-center">
                    @if(Auth::guard('users')->check())
                        <a href="{{ url('/regist_eo') }}" class="cta-btn">Daftar EO Gratis</a>
                    @else
                        <a href="{{ url('/login') }}" class="cta-btn">Daftar EO Gratis</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection
