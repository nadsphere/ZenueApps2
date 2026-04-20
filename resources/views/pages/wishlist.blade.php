@extends('layout.app')
@section('body_class', 'is-wishlist')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_transact.css') }}">
<link rel="stylesheet" href="{{ asset('css/wishlist-inline.css') }}">
@endpush

@section('content')
<div class="booking-page">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header-banner">
            <div class="card-icon">
                <i class="fa fa-heart"></i>
            </div>
            <h2>Wishlist Saya</h2>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert-success-modern">
                <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert-danger-modern">
                <i class="fa fa-exclamation-circle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <!-- Stats Row -->
        <div class="booking-stats-row">
            <div class="booking-stat-card">
                <div class="booking-stat-icon total">
                    <i class="fa fa-heart"></i>
                </div>
                <div class="booking-stat-content">
                    <div class="booking-stat-label">Total Wishlist</div>
                    <div class="booking-stat-value">{{ $favoritesPaginated->total() }} Paket</div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        @if($pakets->isEmpty())
            <!-- Empty State -->
            <div class="booking-empty">
                <div class="booking-empty-icon">
                    <i class="fa fa-heart-o"></i>
                </div>
                <h2>Wishlist Kosong</h2>
                <p>Anda belum menambahkan paket ke wishlist. Jelajahi paket dan tambahkan favorit Anda!</p>
                <a href="{{ url('/paket') }}" class="btn-browse">
                    <i class="fa fa-compass"></i> Jelajahi Paket
                </a>
            </div>
        @else
            <!-- Section Card -->
            <div class="section-card">
                <div class="section-card-header">
                    <i class="fa fa-heart"></i>
                    <h3>Daftar Wishlist</h3>
                </div>
                <div class="wishlist-grid">
                    @foreach($pakets as $paket)
                        <div class="package-card">
                            <div class="package-image">
                                @php
                                    $images = json_decode($paket->gambar_paket);
                                    $uploadPath = $images && count($images) > 0 ? $images[0] : null;
                                    $hasImage = $uploadPath && file_exists(public_path('img/upload/'.$uploadPath));

                                    $categoryImageMap = [
                                        'Wedding'     => 'img/items/wedding-master.jpg',
                                        'Party'      => 'img/items/bgd.jpg',
                                        'Concert'    => 'img/items/cont.png',
                                        'Conference' => 'img/items/cat-1.jpg',
                                        'Catering'   => 'img/items/bgd.jpg',
                                        'Rental'     => 'img/items/stores.png',
                                    ];
                                    $fallbackImage = $categoryImageMap[$paket->kategori] ?? null;
                                    $hasFallbackImage = $fallbackImage && file_exists(public_path($fallbackImage));

                                    $gradients = [
                                        'Wedding'     => 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                                        'Party'        => 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                                        'Concert'      => 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                                        'Conference'   => 'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                                        'Catering'     => 'linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%)',
                                        'Rental'       => 'linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%)',
                                        'default'      => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                                    ];
                                    $gradient = $gradients[$paket->kategori] ?? $gradients['default'];
                                @endphp
                                @if($hasImage)
                                    <img src="{{ asset('img/upload/'.$uploadPath) }}" alt="{{ $paket->nama_paket }}">
                                @elseif($hasFallbackImage)
                                    <img src="{{ asset($fallbackImage) }}" alt="{{ $paket->nama_paket }}">
                                @else
                                    <div class="image-placeholder" style="background: {{ $gradient }};">
                                        <i class="fa fa-image"></i>
                                        <span>{{ $paket->kategori ?? 'Package' }}</span>
                                    </div>
                                @endif
                                <span class="package-category">{{ $paket->kategori ?? 'Umum' }}</span>
                                <span class="package-price">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</span>
                            </div>
                            <div class="package-body">
                                <h5 class="package-title">{{ Str::limit($paket->nama_paket, 25, '...') }}</h5>
                                <p class="package-eo">
                                    <i class="fa fa-building"></i>
                                    {{ $paket->eo->nama_eo ?? 'EO' }}
                                </p>
                                <div class="package-rating">
                                    <div class="stars">
                                        @php
                                            $avgRating = round($paket->ratings->avg('rating') ?? 0);
                                        @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star {{ $i <= $avgRating ? '' : 'empty' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="rating-count">({{ $paket->ratings->count() }} review)</span>
                                </div>
                                <div class="package-actions">
                                    <a href="{{ url('/detail_paket/'.$paket->id) }}" class="btn-detail">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    @php
                                        $favoriteEntry = $favorites->where('paket_id', $paket->id)->first();
                                    @endphp
                                    @if($favoriteEntry)
                                        <a href="javascript:void(0)"
                                           class="wishlist-remove-btn"
                                           onclick="openRemoveModal({{ $favoriteEntry->id }}, '{{ addslashes($paket->nama_paket) }}')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($favoritesPaginated->hasPages())
                    <div class="pagination-wrapper">
                        {{ $favoritesPaginated->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>

<!-- Remove Confirmation Modal -->
<div class="modal-backdrop-custom" id="removeModalBackdrop">
    <div class="modal-custom" role="dialog" aria-modal="true">
        <div class="modal-custom-header">
            <h5><i class="fa fa-exclamation-triangle"></i> Konfirmasi Hapus</h5>
        </div>
        <div class="modal-custom-body">
            <div class="modal-custom-icon">
                <i class="fa fa-trash"></i>
            </div>
            <p>Apakah Anda yakin ingin menghapus</p>
            <p class="paket-name" id="removePaketName"></p>
            <small>dari wishlist Anda?</small>
        </div>
        <div class="modal-custom-footer">
            <a href="javascript:void(0)" class="modal-btn-cancel" onclick="closeRemoveModal()">Batal</a>
            <a href="#" id="confirmRemoveBtn" class="modal-btn-confirm">
                <i class="fa fa-trash"></i> Hapus
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/wishlist-inline.js') }}"></script>

@endsection
