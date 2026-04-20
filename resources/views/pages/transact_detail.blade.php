@extends('layout.app')
@section('body_class', 'is-transact')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/transact_detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/transact-detail-inline.css') }}">
@endpush
@section('content')
<section class="booking-detail-page">
<div class="container">

    <!-- Back Button -->
    <a href="{{ url('/booking') }}" class="btn-back-top">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert-success-modern">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert-danger-modern">{{ session('error') }}</div>
    @endif

    <!-- Booking Header -->
    <div class="booking-header-card">
        <div class="booking-header-top">
            <div class="booking-header-left">
                <div class="booking-icon">
                    <i class="fa fa-ticket"></i>
                </div>
                <div class="booking-header-info">
                    <h2>Detail Pesanan</h2>
                    <p>Kode Booking: <span class="kode">{{ $transaction->kode_booking }}</span></p>
                </div>
            </div>
            @php
                $statusClass = match($transaction->status_pembayaran) {
                    0 => 'menunggu',
                    1 => 'dibayar',
                    2 => 'dikonfirmasi',
                    3 => 'dibatalkan',
                    default => 'menunggu'
                };
                $statusLabel = match($transaction->status_pembayaran) {
                    0 => 'Menunggu Pembayaran',
                    1 => 'Sudah Dibayar',
                    2 => 'Dikonfirmasi',
                    3 => 'Dibatalkan',
                    default => 'Unknown'
                };
            @endphp
            <div class="booking-status-badge {{ $statusClass }}">
                {{ $statusLabel }}
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="booking-content">

        <!-- Left Column -->
        <div class="booking-main">

            <!-- Package Preview -->
            @php
                $images = json_decode($transaction->paket->gambar_paket ?? '[]', true) ?? [];
                $hasImage = count($images) > 0 && file_exists(public_path('img/upload/'.$images[0]));

                $gradients = [
                    'Wedding'     => 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                    'Party'       => 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                    'Concert'     => 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                    'Conference'  => 'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                    'Catering'   => 'linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%)',
                    'Rental'      => 'linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%)',
                    'default'     => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                ];
                $gradient = $gradients[$transaction->paket->kategori ?? ''] ?? $gradients['default'];
            @endphp
            <div class="package-preview">
                <div class="package-preview-image">
                    @if($hasImage)
                        <img src="{{ asset('img/upload/'.$images[0]) }}" alt="{{ $transaction->paket->nama_paket }}">
                    @else
                        <div class="package-preview-placeholder" style="background: {{ $gradient }};">
                            <i class="fa fa-image"></i>
                        </div>
                    @endif
                    <span class="package-preview-badge">{{ $transaction->paket->kategori ?? 'Paket' }}</span>
                    <span class="package-preview-price">Rp {{ number_format($transaction->paket->harga_paket ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="package-preview-body">
                    <h5>{{ $transaction->paket->nama_paket ?? 'N/A' }}</h5>
                    <p>
                        <i class="fa fa-building"></i>
                        {{ $transaction->paket->eo->nama_eo ?? 'Event Organizer' }}
                    </p>
                </div>
            </div>

            <!-- Order Info Card -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <i class="fa fa-shopping-bag"></i>
                    <h4>Informasi Pesanan</h4>
                </div>
                <div class="detail-card-body">
                    <div class="detail-row">
                        <span class="detail-label">Nama Paket</span>
                        <span class="detail-value">{{ $transaction->paket->nama_paket ?? 'N/A' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Kategori</span>
                        <span class="detail-value"><span class="category-badge">{{ $transaction->paket->kategori ?? 'N/A' }}</span></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Tanggal Acara</span>
                        <span class="detail-value highlight">
                            <i class="fa fa-calendar" style="color:#c0392b;margin-right:4px;"></i>
                            {{ $transaction->tanggal_acara ? \Carbon\Carbon::parse($transaction->tanggal_acara)->format('d M Y') : 'N/A' }}
                        </span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Tanggal Pesan</span>
                        <span class="detail-value">{{ $transaction->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>
            </div>

            <!-- Customer Info Card -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <i class="fa fa-user"></i>
                    <h4>Informasi Pelanggan</h4>
                </div>
                <div class="detail-card-body">
                    <div class="detail-row">
                        <span class="detail-label">Nama</span>
                        <span class="detail-value">{{ $transaction->user->name ?? 'N/A' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email</span>
                        <span class="detail-value">{{ $transaction->email }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">No. Telepon</span>
                        <span class="detail-value">{{ $transaction->no_telp }}</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="booking-sidebar">

            <!-- Total Summary -->
            <div class="total-summary-card">
                <div class="label">Total Pembayaran</div>
                <div class="amount">Rp {{ number_format($transaction->paket->harga_paket ?? 0, 0, ',', '.') }}</div>
            </div>

            <!-- EO Card -->
            @if($transaction->paket->eo)
            <div class="eo-mini-card">
                <div class="eo-mini-header">
                    <div class="eo-mini-avatar">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="eo-mini-info">
                        <h5>{{ $transaction->paket->eo->nama_eo ?? 'Event Organizer' }}</h5>
                        <p>Event Organizer</p>
                    </div>
                </div>
                <div class="eo-mini-body">
                    @if($transaction->paket->eo->alamat)
                    <div class="eo-mini-item">
                        <i class="fa fa-map-marker"></i>
                        {{ $transaction->paket->eo->alamat }}
                    </div>
                    @endif
                    @if($transaction->paket->eo->email)
                    <div class="eo-mini-item">
                        <i class="fa fa-envelope"></i>
                        {{ $transaction->paket->eo->email }}
                    </div>
                    @endif
                    @if($transaction->paket->eo->kontak)
                    <div class="eo-mini-item">
                        <i class="fa fa-phone"></i>
                        {{ $transaction->paket->eo->kontak }}
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Action Card -->
            <div class="action-card">
                @if($transaction->status_pembayaran == 0)
                    <button class="btn-pay" onclick="alert('Fitur pembayaran akan segera hadir!')">
                        <i class="fa fa-credit-card"></i> Bayar Sekarang
                    </button>
                    <a href="javascript:void(0)"
                       class="btn-cancel"
                       onclick="openCancelModal('{{ url('/booking/delete/'.$transaction->id) }}', '{{ $transaction->paket->nama_paket ?? 'pesanan ini' }}')">
                        <i class="fa fa-times"></i> Batalkan Pesanan
                    </a>
                @elseif($transaction->status_pembayaran == 1)
                    <div style="text-align:center;padding:12px;background:#cce5ff;border-radius:8px;color:#004085;font-size:13px;font-weight:600;">
                        <i class="fa fa-clock" style="margin-right:6px;"></i>Menunggu Konfirmasi EO
                    </div>
                @elseif($transaction->status_pembayaran == 2)
                    <div style="text-align:center;padding:12px;background:#d4edda;border-radius:8px;color:#155724;font-size:13px;font-weight:600;">
                        <i class="fa fa-check-circle" style="margin-right:6px;"></i>Pesanan Dikonfirmasi
                    </div>
                @else
                    <div style="text-align:center;padding:12px;background:#f8d7da;border-radius:8px;color:#721c24;font-size:13px;font-weight:600;">
                        <i class="fa fa-times-circle" style="margin-right:6px;"></i>Pesanan Dibatalkan
                    </div>
                @endif
            </div>

        </div>
    </div>

</div>

<!-- Cancel Confirmation Modal -->
<div class="modal-backdrop-custom" id="cancelModal">
    <div class="modal-custom" role="dialog" aria-modal="true">
        <div class="modal-custom-header">
            <h5><i class="fa fa-exclamation-triangle"></i> Konfirmasi Batalkan</h5>
        </div>
        <div class="modal-custom-body">
            <div class="modal-custom-icon">
                <i class="fa fa-times-circle"></i>
            </div>
            <p>Apakah Anda yakin ingin membatalkan</p>
            <p class="paket-name" id="cancelModalName"></p>
            <small>dari daftar pesanan Anda?</small>
        </div>
        <div class="modal-custom-footer">
            <a href="javascript:void(0)" class="modal-btn-cancel" onclick="closeCancelModal()">Batal</a>
            <a href="#" id="cancelConfirmBtn" class="modal-btn-confirm">
                <i class="fa fa-times"></i> Batalkan
            </a>
        </div>
    </div>
</div>

<script src="{{ asset('js/transact-detail-inline.js') }}"></script>
</section>
@endsection
