@extends('layout.app')
@section('body_class', 'is-eo-notif')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/notification.css') }}">
@endpush
@section('content')
<main id="main">
<section class="notif-page">
<div class="container">

    <!-- Page Header -->
    <div class="page-header-banner">
        <div class="card-icon">
            <i class="fa fa-bell"></i>
        </div>
        <h2>Notifikasi</h2>
    </div>

    <!-- Stats Row -->
    <div class="notif-stats-row">
        <div class="notif-stat-card">
            <div class="stat-icon total">
                <i class="fa fa-bell"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $notifications->total() }}</h3>
                <p>Total Notifikasi</p>
            </div>
        </div>
        <div class="notif-stat-card">
            <div class="stat-icon unread">
                <i class="fa fa-exclamation-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $unreadCount }}</h3>
                <p>Belum Dibaca</p>
            </div>
        </div>
    </div>

    <!-- Bulk Actions Bar (hidden by default) -->
    <div class="notif-bulk-bar" id="notif-bulk-bar" style="display:none;">
        <span class="notif-selected-count" id="notif-selected-count">0 dipilih</span>
        <div class="notif-bulk-actions">
            <button type="button" class="notif-bulk-btn" onclick="notifBulkMarkRead()">
                <i class="fa fa-check"></i> Tandai Dibaca
            </button>
            <button type="button" class="notif-bulk-btn notif-bulk-btn-delete" onclick="notifBulkDelete()">
                <i class="fa fa-trash"></i> Hapus
            </button>
        </div>
    </div>

    <!-- Main Card -->
    <div class="notif-main-card">
        <div class="notif-main-header">
            <label class="notif-check-all">
                <input type="checkbox" id="notif-check-all" onchange="notifToggleAll(this)">
            </label>
            <div class="card-icon">
                <i class="fa fa-list"></i>
            </div>
            <h3>Semua Notifikasi</h3>
            @if($notifications->hasPages())
            <span class="page-info">Halaman {{ $notifications->currentPage() }} dari {{ $notifications->lastPage() }}</span>
            @endif
        </div>

        @if($notifications->isEmpty())
        <div class="notif-empty">
            <i class="fa fa-bell-slash"></i>
            <h5>Belum Ada Notifikasi</h5>
            <p>Tidak ada notifikasi untuk saat ini.</p>
        </div>
        @else
        <ul class="notif-list">
            @foreach($notifications as $notification)
            @php
                $iconMap = [
                    'booking_created' => 'fa-shopping-bag',
                    'payment_received' => 'fa-credit-card',
                    'booking_confirmed' => 'fa-check-circle',
                    'booking_cancelled' => 'fa-times-circle',
                    'booking_pending' => 'fa-clock-o',
                ];
                $colorMap = [
                    'booking_created' => '#3498db',
                    'payment_received' => '#27ae60',
                    'booking_confirmed' => '#27ae60',
                    'booking_cancelled' => '#e74c3c',
                    'booking_pending' => '#f39c12',
                ];
                $icon = $iconMap[$notification->type] ?? 'fa-bell';
                $color = $colorMap[$notification->type] ?? '#6c757d';
            @endphp
            <li class="notif-list-item {{ !$notification->is_read ? 'unread' : '' }}" id="notif-item-{{ $notification->id }}">
                <label class="notif-item-check">
                    <input type="checkbox"
                           class="notif-item-checkbox"
                           value="{{ $notification->id }}"
                           onchange="notifItemChanged()">
                </label>
                <div class="notif-item-icon">
                    <div class="notif-icon-wrap" style="background:{{ $color }}15;">
                        <i class="fa {{ $icon }}" style="color:{{ $color }}; font-size:17px;"></i>
                    </div>
                </div>
                <div class="notif-item-body" onclick="markAsRead({{ $notification->id }}, '{{ $notification->link ? url($notification->link) : '' }}')">
                    <div class="notif-item-title-row">
                        <span class="notif-item-title-text">{{\Illuminate\Support\Str::limit($notification->title, 50)}}</span>
                        @if(!$notification->is_read)
                        <span class="unread-dot"></span>
                        @endif
                    </div>
                    <p class="notif-item-msg">{{\Illuminate\Support\Str::limit($notification->message, 100)}}</p>
                </div>
                <div class="notif-item-right">
                    <span class="notif-item-time">{{ $notification->created_at->diffForHumans() }}</span>
                    <button class="notif-delete-btn" onclick="event.stopPropagation(); deleteNotification({{ $notification->id }})" title="Hapus">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </li>
            @endforeach
        </ul>

        @if($notifications->hasPages())
        <div class="notif-pagination">
            {!! $notifications->links('pagination::bootstrap-4') !!}
        </div>
        @endif
        @endif
    </div>

</div>

<!-- Delete Confirmation Modal -->
<div class="modal-backdrop-custom" id="notifDeleteModal">
    <div class="modal-custom" role="dialog" aria-modal="true">
        <div class="modal-custom-header">
            <h5><i class="fa fa-exclamation-triangle"></i> Konfirmasi Hapus</h5>
        </div>
        <div class="modal-custom-body">
            <div class="modal-custom-icon">
                <i class="fa fa-trash"></i>
            </div>
            <p>Apakah Anda yakin ingin menghapus</p>
            <p class="paket-name" id="notifDeleteName"></p>
            <small id="notifDeleteSubtext"></small>
        </div>
        <div class="modal-custom-footer">
            <a href="javascript:void(0)" class="modal-btn-cancel" onclick="closeNotifDeleteModal()">Batal</a>
            <a href="javascript:void(0)" class="modal-btn-confirm" onclick="confirmNotifDelete()">
                <i class="fa fa-trash"></i> Hapus
            </a>
        </div>
    </div>
</div>
</section>
</main>
@endsection
