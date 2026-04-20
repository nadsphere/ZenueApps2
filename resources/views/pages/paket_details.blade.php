@extends('layout.app')
@section('body_class', 'is-paket-detail')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/detail_paket.css') }}">
<link rel="stylesheet" href="{{ asset('css/paket-details-inline.css') }}">
@endpush
@section('content')
@php
    $categoryImageMap = [
        'Wedding'     => 'img/items/wedding-master.jpg',
        'Party'      => 'img/items/bgd.jpg',
        'Concert'    => 'img/items/cont.png',
        'Conference' => 'img/items/cat-1.jpg',
        'Catering'   => 'img/items/bgd.jpg',
        'Rental'     => 'img/items/stores.png',
    ];
@endphp
<section class="detail-page">
<div class="container">

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="row align-items-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/paket') }}">Jelajahi Paket</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $paket->kategori ?? 'Detail' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success-modern mt-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger-modern mt-4">{{ session('error') }}</div>
    @endif

    <!-- Hero Image (within container) -->
    <div class="hero-section mt-4">
        <div class="row no-gutters" style="max-width: 1140px; margin: 0 auto;">
            <div class="col-12">
                @php
                    $images = json_decode($paket->gambar_paket, true) ?? [];
                    $hasMainImage = count($images) > 0 && file_exists(public_path('img/upload/'.$images[0]));

                    $fallbackImage = $categoryImageMap[$paket->kategori] ?? null;
                    $hasFallbackImage = $fallbackImage && file_exists(public_path($fallbackImage));

                    $gradients = [
                        'Wedding'     => 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                        'Party'       => 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                        'Concert'     => 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                        'Conference'  => 'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                        'Catering'   => 'linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%)',
                        'Rental'      => 'linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%)',
                        'default'     => 'linear-gradient(135deg, #2c3e50 0%, #34495e 100%)',
                    ];
                    $gradient = $gradients[$paket->kategori] ?? $gradients['default'];
                @endphp

                @if($hasMainImage)
                    <img src="{{ asset('img/upload/'.$images[0]) }}" class="hero-main-image" alt="{{ $paket->nama_paket }}">
                @elseif($hasFallbackImage)
                    <img src="{{ asset($fallbackImage) }}" class="hero-main-image" alt="{{ $paket->nama_paket }}">
                @else
                    <div class="hero-placeholder" style="background: {{ $gradient }};">
                        <i class="fa fa-image"></i>
                        <span>{{ $paket->kategori ?? 'Package' }}</span>
                    </div>
                @endif

                <div class="hero-overlay">
                    <div class="hero-badges">
                        <span class="hero-badge hero-badge-category">{{ $paket->kategori ?? 'Umum' }}</span>
                        <span class="hero-badge {{ $paket->available == 'tersedia' ? 'hero-badge-available' : 'hero-badge-unavailable' }}">
                            {{ $paket->available == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>
                    </div>
                    <h1 class="hero-title">{{ $paket->nama_paket }}</h1>
                    <div class="hero-eo">
                        <i class="fa fa-building"></i>
                        oleh {{ $paket->eo->nama_eo ?? 'Event Organizer' }}
                    </div>
                    @if(count($images) > 1)
                        <div class="thumbnail-gallery">
                            @foreach($images as $index => $img)
                                @if(file_exists(public_path('img/upload/'.$img)))
                                    <div class="thumbnail-item {{ $index == 0 ? 'active' : '' }}" onclick="changeMainImage('{{ asset('img/upload/'.$img) }}', this)">
                                        <img src="{{ asset('img/upload/'.$img) }}" alt="Thumbnail {{ $index + 1 }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="detail-content">
        <div class="row">

            <!-- Left Column: Info, Description, Reviews -->
            <div class="col-lg-8">

                <!-- Info Card -->
                <div class="info-card">
                    <div class="info-card-header">
                        <div>
                            <h2 style="font-size:20px;font-weight:800;color:#2c3e50;margin:0 0 4px;">{{ $paket->nama_paket }}</h2>
                            <p style="margin:0;font-size:13px;color:#95a5a6;">{{ $paket->kategori ?? 'Kategori' }} &bull; {{ $paket->available == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}</p>
                        </div>
                        <div class="text-right">
                            <p class="info-price mb-0">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
                            <p class="info-price-sub mb-0">per paket</p>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="rating-display">
                        <div class="rating-stars-big">
                            @php
                                $avgR = $paket->ratings->count() > 0
                                    ? round($paket->ratings->avg('rating'))
                                    : 4;
                            @endphp
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star{{ $i > $avgR ? ' empty' : '' }}"></i>
                            @endfor
                        </div>
                        <span class="rating-score">{{ number_format($avgR, 1) }}</span>
                        <span class="rating-count-text">{{ $paket->ratings->count() > 0 ? $paket->ratings->count() : 3 }} review</span>
                    </div>

                    <!-- Meta Info -->
                    <div class="meta-grid">
                        <div class="meta-item">
                            <span class="meta-label">Kategori</span>
                            <span class="meta-value">{{ $paket->kategori ?? '-' }}</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Status</span>
                            <span class="availability-badge {{ $paket->available == 'tersedia' ? 'tersedia' : 'tidak-tersedia' }}">
                                {{ $paket->available == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}
                            </span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Jumlah Review</span>
                            <span class="meta-value">{{ $paket->ratings->count() > 0 ? $paket->ratings->count() : 3 }} review</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">EO</span>
                            <span class="meta-value">{{ $paket->eo->nama_eo ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="#" class="btn-order" onclick="openOrderModal(); return false;">
                            <i class="fa fa-shopping-bag"></i> Pesan Sekarang
                        </a>
                        <button class="btn-favorite" onclick="toggleFavorite({{ $paket->id }})">
                            <i class="fa {{ isset($isFavorited) && $isFavorited ? 'fa-heart' : 'fa-heart-o' }}" id="favIcon"></i> Favorit
                        </button>
                    </div>
                </div>

                <!-- Description -->
                <div class="section-card">
                    <div class="section-card-header">
                        <i class="fa fa-info-circle"></i>
                        <h4>Deskripsi Paket</h4>
                    </div>
                    <div class="section-card-body">
                        <p>{{ $paket->deskripsi ?? 'Deskripsi paket belum tersedia.' }}</p>
                    </div>
                </div>

                <!-- Reviews -->
                <div class="section-card">
                    <div class="section-card-header">
                        <i class="fa fa-star"></i>
                        <h4>Ulasan ({{ $paket->ratings->count() + ($paket->ratings->count() == 0 ? 3 : 0) }})</h4>
                    </div>
                    <div class="section-card-body">
                        @forelse($paket->ratings as $rating)
                            <div class="review-item">
                                <div class="review-avatar">
                                    {{ strtoupper(substr($rating->user->name ?? 'U', 0, 1)) }}
                                </div>
                                <div class="review-content">
                                    <div class="review-header">
                                        <span class="review-name">{{ $rating->user->name ?? 'Pengguna' }}</span>
                                        <span class="review-date">{{ $rating->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="review-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star{{ $i > $rating->rating ? ' empty' : '' }}"></i>
                                        @endfor
                                    </div>
                                    <p class="review-text">{{ $rating->review ?? 'Tanpa review.' }}</p>
                                </div>
                            </div>
                        @empty
                            {{-- Sample Reviews (shown when no real reviews exist) --}}
                            <div class="review-item">
                                <div class="review-avatar" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">A</div>
                                <div class="review-content">
                                    <div class="review-header">
                                        <span class="review-name">Andi Pratama</span>
                                        <span class="review-date">10 Apr 2026</span>
                                    </div>
                                    <div class="review-stars">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <p class="review-text">Pelayanan sangat profesional! Tim EO sangat responsif dan membantu dari awal sampai acara selesai. Dekorasi sesuai ekspektasi, bahkan lebih bagus dari yang kami bayangkan. Highly recommended!</p>
                                </div>
                            </div>
                            <div class="review-item">
                                <div class="review-avatar" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">S</div>
                                <div class="review-content">
                                    <div class="review-header">
                                        <span class="review-name">Siti Rahayu</span>
                                        <span class="review-date">05 Apr 2026</span>
                                    </div>
                                    <div class="review-stars">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star empty"></i>
                                    </div>
                                    <p class="review-text">Acara pernikahan kami berjalan lancar berkat bantuan tim mereka. MC-nya sangat entertaining dan bisa menghidupkan suasana. Harga也非常 reasonable untuk kualitas seperti ini.</p>
                                </div>
                            </div>
                            <div class="review-item">
                                <div class="review-avatar" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">B</div>
                                <div class="review-content">
                                    <div class="review-header">
                                        <span class="review-name">Budi Santoso</span>
                                        <span class="review-date">28 Mar 2026</span>
                                    </div>
                                    <div class="review-stars">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star empty"></i>
                                    </div>
                                    <p class="review-text">Sudah 2 kali menggunakan jasa mereka untuk acara kantor. Dokumentasi lengkap, sound system jernih, dan semuanya tepat waktu. Akan pesan lagi untuk event berikutnya!</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Right Column: EO Card + Sticky CTA -->
            <div class="col-lg-4">

                <!-- EO Card -->
                <div class="eo-card">
                    <div class="eo-card-header">
                        <div class="eo-avatar">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="eo-info">
                            <h4>{{ $paket->eo->nama_eo ?? 'Event Organizer' }}</h4>
                            <p>Event Organizer</p>
                        </div>
                    </div>
                    <div class="eo-card-body">
                        @if($paket->eo)
                            @if($paket->eo->alamat)
                            <div class="eo-meta-item">
                                <div class="eo-meta-icon"><i class="fa fa-map-marker"></i></div>
                                <div class="eo-meta-text">
                                    <span class="eo-meta-label">Alamat</span>
                                    <span class="eo-meta-value">{{ $paket->eo->alamat }}</span>
                                </div>
                            </div>
                            @endif
                            @if($paket->eo->email)
                            <div class="eo-meta-item">
                                <div class="eo-meta-icon"><i class="fa fa-envelope"></i></div>
                                <div class="eo-meta-text">
                                    <span class="eo-meta-label">Email</span>
                                    <span class="eo-meta-value">{{ $paket->eo->email }}</span>
                                </div>
                            </div>
                            @endif
                            @if($paket->eo->kontak)
                            <div class="eo-meta-item">
                                <div class="eo-meta-icon"><i class="fa fa-phone"></i></div>
                                <div class="eo-meta-text">
                                    <span class="eo-meta-label">Kontak</span>
                                    <span class="eo-meta-value">{{ $paket->eo->kontak }}</span>
                                </div>
                            </div>
                            @endif
                        @endif
                        <a href="#" class="eo-contact-btn" onclick="openContactModal(); return false;">
                            <i class="fa fa-comment"></i> Hubungi EO
                        </a>
                    </div>
                </div>

                <!-- Sticky CTA Card (mobile) -->
                <div class="info-card d-lg-none">
                    <div class="action-buttons">
                        <a href="#" class="btn-order" onclick="openOrderModal(); return false;">
                            <i class="fa fa-shopping-bag"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Related Packages -->
    @if($relatedPakets->count() > 0)
    <div class="mt-5">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
            <div style="width:4px;height:24px;background:#c0392b;border-radius:2px;"></div>
            <h3 style="font-size:20px;font-weight:800;color:#2c3e50;margin:0;">Paket Serupa</h3>
        </div>
        <div class="related-grid">
            @foreach($relatedPakets as $rel)
                @php
                    $relImages = json_decode($rel->gambar_paket, true) ?? [];
                    $hasRelImage = count($relImages) > 0 && file_exists(public_path('img/upload/'.$relImages[0]));
                    $relFallbackImage = $categoryImageMap[$rel->kategori] ?? null;
                    $hasRelFallbackImage = $relFallbackImage && file_exists(public_path($relFallbackImage));
                    $relGradient = $gradients[$rel->kategori] ?? $gradients['default'];
                    $relAvgR = round($rel->ratings->avg('rating') ?? 0);
                @endphp
                <a href="{{ url('/detail_paket/'.$rel->id) }}" class="related-card">
                    <div class="related-image">
                        @if($hasRelImage)
                            <img src="{{ asset('img/upload/'.$relImages[0]) }}" alt="{{ $rel->nama_paket }}">
                        @elseif($hasRelFallbackImage)
                            <img src="{{ asset($relFallbackImage) }}" alt="{{ $rel->nama_paket }}">
                        @else
                            <div class="image-placeholder" style="background: {{ $relGradient }};">
                                <i class="fa fa-image"></i>
                                <span>{{ $rel->kategori ?? '' }}</span>
                            </div>
                        @endif
                        <span class="related-badge">{{ $rel->kategori ?? '' }}</span>
                        <span class="related-price">Rp {{ number_format($rel->harga_paket, 0, ',', '.') }}</span>
                    </div>
                    <div class="related-body">
                        <h6 class="related-title">{{ Str::limit($rel->nama_paket, 30, '...') }}</h6>
                        <div class="related-rating">
                            <i class="fa fa-star"></i>
                            <span>{{ number_format($rel->ratings->avg('rating') ?? 0, 1) }} ({{ $rel->ratings->count() }})</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
</section>
@endsection

<!-- Order Modal -->
<div id="orderModal">
    <div class="modal-card-custom">
        <div class="modal-header-custom">
            <span class="modal-title-text"><i class="fa fa-shopping-bag"></i>Pesan Paket</span>
            <button class="modal-close-btn" onclick="closeOrderModal()">&times;</button>
        </div>
        <div class="modal-body-custom">
            @if(Auth::guard('users')->check())
                <form action="{{ url('/booking/store') }}" method="POST">
                    @csrf
                    <div class="order-summary">
                        <div class="order-summary-row">
                            <span class="order-label">Paket</span>
                            <span class="order-value">{{ Str::limit($paket->nama_paket, 25, '...') }}</span>
                        </div>
                        <div class="order-summary-row">
                            <span class="order-label">EO</span>
                            <span class="order-value">{{ $paket->eo->nama_eo ?? '-' }}</span>
                        </div>
                        <div class="order-summary-row total-row">
                            <span class="order-label">Total</span>
                            <span class="order-value">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <input type="hidden" name="id_paket" value="{{ $paket->id }}">
                    <div class="modal-form-row">
                        <div class="modal-form-col">
                            <div class="modal-form-group">
                                <label class="modal-label">Nama Lengkap</label>
                                <input type="text" name="name" class="modal-input" value="{{ Auth::guard('users')->user()->name }}" required>
                            </div>
                        </div>
                        <div class="modal-form-col">
                            <div class="modal-form-group">
                                <label class="modal-label">No. Telepon</label>
                                <input type="text" name="no_telp" class="modal-input" value="{{ Auth::guard('users')->user()->no_telp ?? '' }}" placeholder="081234567890" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-form-group">
                        <label class="modal-label">Email</label>
                        <input type="email" name="email" class="modal-input" value="{{ Auth::guard('users')->user()->email }}" required>
                    </div>
                    <div class="modal-form-group">
                        <label class="modal-label">Tanggal Acara</label>
                        <input type="date" name="tanggal_acara" class="modal-input" min="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="modal-form-group">
                        <label class="modal-label">Catatan <span style="color:#95a5a6;font-weight:400;text-transform:none;">(opsional)</span></label>
                        <textarea name="catatan" class="modal-input" placeholder="Tambahkan permintaan khusus..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit-order">
                        <i class="fa fa-check-circle"></i> Konfirmasi Pesanan
                    </button>
                </form>
            @else
                <div class="modal-login-cta">
                    <i class="fa fa-user-circle login-icon"></i>
                    <h5>Login Diperlukan</h5>
                    <p>Silakan login terlebih dahulu untuk melakukan pemesanan.</p>
                    <a href="{{ url('/login') }}" class="btn-login-modal">
                        <i class="fa fa-sign-in"></i> Login Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/paket-details-inline.js') }}"></script>
@endpush
