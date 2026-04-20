@extends('layout.app')
@section('body_class', 'is-booking')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_transact.css') }}">
<link rel="stylesheet" href="{{ asset('css/user-transact-inline.css') }}">
@endpush
@section('content')
<main id="main">
<section class="booking-page">
<div class="container">

    <!-- Page Title - Matching Informasi Akun card-header style -->
    <div class="page-header-banner">
        <div class="card-icon">
            <i class="fa fa-shopping-bag"></i>
        </div>
        <h2>Pesanan Saya</h2>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert-success-modern">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert-danger-modern">{{ session('error') }}</div>
    @endif

    <!-- Stats Row -->
    <div class="booking-stats-row">
        <div class="booking-stat-card">
            <div class="stat-icon total">
                <i class="fa fa-shopping-bag"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $transactions->count() }}</h3>
                <p>Total Pesanan</p>
            </div>
        </div>
        <div class="booking-stat-card">
            <div class="stat-icon menunggu">
                <i class="fa fa-clock-o"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $transactions->where('status_pembayaran', 0)->count() }}</h3>
                <p>Menunggu</p>
            </div>
        </div>
        <div class="booking-stat-card">
            <div class="stat-icon dibayar">
                <i class="fa fa-check-circle-o"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $transactions->where('status_pembayaran', 1)->count() }}</h3>
                <p>Dibayar</p>
            </div>
        </div>
        <div class="booking-stat-card">
            <div class="stat-icon dikonfirmasi">
                <i class="fa fa-thumbs-up"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $transactions->where('status_pembayaran', 2)->count() }}</h3>
                <p>Dikonfirmasi</p>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="table-card">
        <div class="table-card-header">
            <div class="card-icon">
                <i class="fa fa-list"></i>
            </div>
            <h3>Daftar Pesanan</h3>
        </div>
        <div class="table-card-body">
            @if($transactions->count() > 0)
                <table class="booking-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Booking</th>
                            <th>Nama Pelanggan</th>
                            <th>Paket</th>
                            <th>Tanggal Acara</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $index => $transaction)
                            @php
                                $statusClass = match($transaction->status_pembayaran) {
                                    0 => 'menunggu',
                                    1 => 'dibayar',
                                    2 => 'dikonfirmasi',
                                    3 => 'dibatalkan',
                                    default => 'menunggu'
                                };
                                $statusLabel = match($transaction->status_pembayaran) {
                                    0 => 'Menunggu',
                                    1 => 'Dibayar',
                                    2 => 'Dikonfirmasi',
                                    3 => 'Dibatalkan',
                                    default => 'Unknown'
                                };
                            @endphp
                            <tr>
                                <td class="td-no">{{ $index + 1 }}</td>
                                <td class="td-date">
                                    {{ $transaction->created_at->format('d M Y') }}
                                </td>
                                <td class="td-kode">{{ $transaction->kode_booking }}</td>
                                <td class="td-pelanggan">{{ $transaction->user->name ?? 'N/A' }}</td>
                                <td class="td-paket">
                                    {{ $transaction->paket->nama_paket ?? 'N/A' }}
                                    <br><small>{{ $transaction->paket->kategori ?? '' }}</small>
                                </td>
                                <td class="td-date">
                                    {{ $transaction->tanggal_acara ? \Carbon\Carbon::parse($transaction->tanggal_acara)->format('d M Y') : 'N/A' }}
                                </td>
                                <td>
                                    <span class="table-status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                </td>
                                <td class="td-actions">
                                    <a href="{{ url('/transact_detail/'.$transaction->id) }}" class="table-action-btn detail">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    @if($transaction->status_pembayaran == 0)
                                        <a href="javascript:void(0)"
                                           class="table-action-btn cancel"
                                           onclick="openCancelModal('{{ url('/booking/delete/'.$transaction->id) }}', '{{ $transaction->paket->nama_paket ?? 'pesanan ini' }}')">
                                            <i class="fa fa-times"></i> Batal
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="table-empty">
                    <i class="fa fa-shopping-bag"></i>
                    <h5>Belum Ada Pesanan</h5>
                    <p>Anda belum memiliki pesanan.</p>
                    <a href="{{ url('/paket') }}" class="btn-browse-dashboard">
                        <i class="fa fa-compass"></i> Jelajahi Paket
                    </a>
                </div>
            @endif
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

<script src="{{ asset('js/user-transact-inline.js') }}"></script>
</section>
</main>
@endsection
