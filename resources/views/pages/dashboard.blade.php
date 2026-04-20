@extends('layout.app')
@section('body_class', 'is-dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
@section('content')
<main id="main">
    <section class="py-5">
        <div class="container">
            <!-- Back Link -->
            <a href="{{ url('/') }}" class="back-link">
                <i class="fa fa-home"></i> Kembali ke Beranda
            </a>

            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Selamat datang, {{ Auth::guard('users')->user()->name }}!</p>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card stat-orders">
                    <div class="stat-icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">{{ $stats['total_orders'] ?? 0 }}</span>
                        <span class="stat-label">Total Pesanan</span>
                    </div>
                </div>

                <div class="stat-card stat-paket">
                    <div class="stat-icon">
                        <i class="fa fa-cube"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">{{ $stats['total_paket'] ?? 0 }}</span>
                        <span class="stat-label">Total Paket</span>
                    </div>
                </div>

                <div class="stat-card stat-pending">
                    <div class="stat-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">{{ $stats['pending'] ?? 0 }}</span>
                        <span class="stat-label">Menunggu</span>
                    </div>
                </div>

                <div class="stat-card stat-revenue">
                    <div class="stat-icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">Rp {{ number_format($stats['revenue'] ?? 0, 0, ',', '.') }}</span>
                        <span class="stat-label">Total Pendapatan</span>
                    </div>
                </div>
            </div>

            <!-- Paket Saya Section -->
            <div class="card mb-4">
                <div class="card-header-custom d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="card-icon">
                            <i class="fa fa-cube"></i>
                        </div>
                        <h3>Paket Saya</h3>
                    </div>
                    <a href="{{ url('/manage_paket') }}" class="view-all">Kelola Paket <i class="fa fa-arrow-right"></i></a>
                </div>
                <div class="card-body-custom p-0">
                    @if(isset($paginatedPakets) && $paginatedPakets->count() > 0)
                        <!-- Pagination Controls -->
                        <div class="table-pagination">
                            <div class="pagination-info">
                                <span>Menampilkan <strong>{{ $paginatedPakets->count() }}</strong> dari <strong>{{ $paginatedPakets->total() }}</strong> paket</span>
                                <div class="per-page-filter">
                                    <label for="per_page_paket">Tampilkan:</label>
                                    <select id="per_page_paket" onchange="changePerPage('pakets', this.value)">
                                        <option value="20" {{ $paginatedPakets->perPage() == 20 ? 'selected' : '' }}>20</option>
                                        <option value="40" {{ $paginatedPakets->perPage() == 40 ? 'selected' : '' }}>40</option>
                                        <option value="80" {{ $paginatedPakets->perPage() == 80 ? 'selected' : '' }}>80</option>
                                        <option value="100" {{ $paginatedPakets->perPage() == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Scrollable Table -->
                        <div class="table-scroll">
                            <table class="table-custom">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginatedPakets as $index => $pkt)
                                    <tr>
                                        <td class="text-center">{{ $paginatedPakets->firstItem() + $index }}</td>
                                        <td class="font-weight-medium">{{ $pkt->nama_paket }}</td>
                                        <td><span class="badge-category">{{ $pkt->kategori ?? 'N/A' }}</span></td>
                                        <td class="font-weight-bold text-primary">Rp {{ number_format($pkt->harga_paket ?? 0, 0, ',', '.') }}</td>
                                        <td>
                                            @if($pkt->available == 1)
                                                <span class="badge badge-success">Tersedia</span>
                                            @else
                                                <span class="badge badge-secondary">Tidak Tersedia</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                        @if($paginatedPakets->hasPages())
                        <div class="pagination-wrapper">
                            <div class="pagination-container">
                                @if($paginatedPakets->onFirstPage())
                                    <span class="page-link disabled"><i class="fa fa-chevron-left"></i></span>
                                @else
                                    <a href="{{ $paginatedPakets->previousPageUrl() }}&per_page={{ $paginatedPakets->perPage() }}&orders_page={{ $paginatedOrders->currentPage() }}" class="page-link"><i class="fa fa-chevron-left"></i></a>
                                @endif

                                @php
                                    $paketCurrentPage = $paginatedPakets->currentPage();
                                    $paketLastPage = $paginatedPakets->lastPage();
                                    $paketStart = max(1, $paketCurrentPage - 2);
                                    $paketEnd = min($paketLastPage, $paketCurrentPage + 2);
                                @endphp

                                @if($paketStart > 1)
                                    <a href="{{ $paginatedPakets->url(1) }}&per_page={{ $paginatedPakets->perPage() }}&orders_page={{ $paginatedOrders->currentPage() }}" class="page-link">1</a>
                                    @if($paketStart > 2)
                                        <span class="page-ellipsis">...</span>
                                    @endif
                                @endif

                                @for($i = $paketStart; $i <= $paketEnd; $i++)
                                    @if($i == $paketCurrentPage)
                                        <span class="page-link active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $paginatedPakets->url($i) }}&per_page={{ $paginatedPakets->perPage() }}&orders_page={{ $paginatedOrders->currentPage() }}" class="page-link">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if($paketEnd < $paketLastPage)
                                    @if($paketEnd < $paketLastPage - 1)
                                        <span class="page-ellipsis">...</span>
                                    @endif
                                    <a href="{{ $paginatedPakets->url($paketLastPage) }}&per_page={{ $paginatedPakets->perPage() }}&orders_page={{ $paginatedOrders->currentPage() }}" class="page-link">{{ $paketLastPage }}</a>
                                @endif

                                @if($paginatedPakets->hasMorePages())
                                    <a href="{{ $paginatedPakets->nextPageUrl() }}&per_page={{ $paginatedPakets->perPage() }}&orders_page={{ $paginatedOrders->currentPage() }}" class="page-link"><i class="fa fa-chevron-right"></i></a>
                                @else
                                    <span class="page-link disabled"><i class="fa fa-chevron-right"></i></span>
                                @endif
                            </div>
                            <div class="pagination-summary">
                                Halaman {{ $paketCurrentPage }} dari {{ $paketLastPage }}
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="empty-state">
                            <i class="fa fa-cube"></i>
                            <p>Belum ada paket</p>
                            <a href="{{ url('/manage_paket') }}" class="btn-empty">Kelola Paket</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Pesanan Terbaru Section -->
            <div class="card mb-4">
                <div class="card-header-custom d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="card-icon">
                            <i class="fa fa-shopping-bag"></i>
                        </div>
                        <h3>Pesanan Terbaru</h3>
                    </div>
                    <a href="{{ url('/order') }}" class="view-all">Lihat Semua <i class="fa fa-arrow-right"></i></a>
                </div>
                <div class="card-body-custom p-0">
                    @if(isset($paginatedOrders) && $paginatedOrders->count() > 0)
                        <!-- Pagination Controls -->
                        <div class="table-pagination">
                            <div class="pagination-info">
                                <span>Menampilkan <strong>{{ $paginatedOrders->count() }}</strong> dari <strong>{{ $paginatedOrders->total() }}</strong> pesanan</span>
                                <div class="per-page-filter">
                                    <label for="per_page_order">Tampilkan:</label>
                                    <select id="per_page_order" onchange="changePerPage('orders', this.value)">
                                        <option value="20" {{ $paginatedOrders->perPage() == 20 ? 'selected' : '' }}>20</option>
                                        <option value="40" {{ $paginatedOrders->perPage() == 40 ? 'selected' : '' }}>40</option>
                                        <option value="80" {{ $paginatedOrders->perPage() == 80 ? 'selected' : '' }}>80</option>
                                        <option value="100" {{ $paginatedOrders->perPage() == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table-custom">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Booking</th>
                                        <th>Nama Paket</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginatedOrders as $index => $order)
                                    <tr>
                                        <td class="text-center">{{ $paginatedOrders->firstItem() + $index }}</td>
                                        <td class="font-weight-medium">{{ $order->kode_booking }}</td>
                                        <td>{{ $order->paket->nama_paket ?? 'N/A' }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if($order->status_pembayaran == 0)
                                                <span class="badge badge-secondary">Belum Bayar</span>
                                            @elseif($order->status_pembayaran == 1)
                                                <span class="badge badge-info">Sudah Bayar</span>
                                            @elseif($order->status_pembayaran == 2)
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($order->status_pembayaran == 3)
                                                <span class="badge badge-danger">Dibatalkan</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                        @if($paginatedOrders->hasPages())
                        <div class="pagination-wrapper">
                            <div class="pagination-container">
                                @if($paginatedOrders->onFirstPage())
                                    <span class="page-link disabled"><i class="fa fa-chevron-left"></i></span>
                                @else
                                    <a href="{{ $paginatedOrders->previousPageUrl() }}&per_page={{ $paginatedOrders->perPage() }}&pakets_page={{ $paginatedPakets->currentPage() }}" class="page-link"><i class="fa fa-chevron-left"></i></a>
                                @endif

                                @php
                                    $currentPage = $paginatedOrders->currentPage();
                                    $lastPage = $paginatedOrders->lastPage();
                                    $start = max(1, $currentPage - 2);
                                    $end = min($lastPage, $currentPage + 2);
                                @endphp

                                @if($start > 1)
                                    <a href="{{ $paginatedOrders->url(1) }}&per_page={{ $paginatedOrders->perPage() }}&pakets_page={{ $paginatedPakets->currentPage() }}" class="page-link">1</a>
                                    @if($start > 2)
                                        <span class="page-ellipsis">...</span>
                                    @endif
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    @if($i == $currentPage)
                                        <span class="page-link active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $paginatedOrders->url($i) }}&per_page={{ $paginatedOrders->perPage() }}&pakets_page={{ $paginatedPakets->currentPage() }}" class="page-link">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if($end < $lastPage)
                                    @if($end < $lastPage - 1)
                                        <span class="page-ellipsis">...</span>
                                    @endif
                                    <a href="{{ $paginatedOrders->url($lastPage) }}&per_page={{ $paginatedOrders->perPage() }}&pakets_page={{ $paginatedPakets->currentPage() }}" class="page-link">{{ $lastPage }}</a>
                                @endif

                                @if($paginatedOrders->hasMorePages())
                                    <a href="{{ $paginatedOrders->nextPageUrl() }}&per_page={{ $paginatedOrders->perPage() }}&pakets_page={{ $paginatedPakets->currentPage() }}" class="page-link"><i class="fa fa-chevron-right"></i></a>
                                @else
                                    <span class="page-link disabled"><i class="fa fa-chevron-right"></i></span>
                                @endif
                            </div>
                            <div class="pagination-summary">
                                Halaman {{ $currentPage }} dari {{ $lastPage }}
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="empty-state">
                            <i class="fa fa-inbox"></i>
                            <p>Belum ada pesanan</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script src="{{ asset('js/dashboard-inline.js') }}"></script>
@endpush
@endsection
