@extends('layout.app')
@section('body_class', 'is-manage')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/manage_paket.css') }}">
@endpush
@section('content')
<main id="main">
    <section class="py-5">
        <div class="container">
            <!-- Back Link -->
            <a href="{{ url('/dashboard') }}" class="back-link">
                <i class="fa fa-arrow-left"></i> Kembali ke Dashboard
            </a>

            <!-- Page Header -->
            <div class="page-header">
                <div class="header-content">
                    <h1 class="page-title">Kelola Paket</h1>
                    <p class="page-subtitle">Tambah, edit, atau hapus paket acara Anda</p>
                </div>
                <button type="button" class="btn-add" data-toggle="modal" data-target="#addPaketModal">
                    <i class="fa fa-plus"></i> Tambah Paket
                </button>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert-custom alert-success-custom">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert-custom alert-danger-custom">{{ session('error') }}</div>
            @endif

            <!-- Statistics -->
            <div class="stats-row">
                <div class="stat-item">
                    <div class="stat-icon-sm stat-icon-primary">
                        <i class="fa fa-cube"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-num">{{ $pakets->total() }}</span>
                        <span class="stat-text">Total Paket</span>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon-sm stat-icon-success">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-num">{{ $pakets->total() > 0 ? $pakets->where('available', 1)->count() : 0 }}</span>
                        <span class="stat-text">Tersedia</span>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon-sm stat-icon-secondary">
                        <i class="fa fa-times-circle"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-num">{{ $pakets->total() > 0 ? $pakets->where('available', 0)->count() : 0 }}</span>
                        <span class="stat-text">Tidak Tersedia</span>
                    </div>
                </div>
            </div>

            <!-- Pagination Controls -->
            <div class="pagination-controls">
                <div class="pagination-info">
                    <span class="pagination-text">
                        Menampilkan <strong>{{ $pakets->count() }}</strong> dari <strong>{{ $pakets->total() }}</strong> paket
                    </span>
                    <div class="per-page-filter">
                        <label for="per_page">Tampilkan:</label>
                        <select id="per_page" name="per_page" onchange="changePerPage(this.value)">
                            <option value="20" {{ $pakets->perPage() == 20 ? 'selected' : '' }}>20</option>
                            <option value="40" {{ $pakets->perPage() == 40 ? 'selected' : '' }}>40</option>
                            <option value="80" {{ $pakets->perPage() == 80 ? 'selected' : '' }}>80</option>
                            <option value="100" {{ $pakets->perPage() == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Packages Grid -->
            <div class="packages-grid">
                @forelse($pakets as $paket)
                <div class="package-card">
                    <div class="package-image">
                        @php
                            $gambar = json_decode($paket->gambar_paket, true);
                            $firstImage = $gambar[0] ?? null;
                        @endphp
                        @if($firstImage)
                            <img src="{{ asset('img/upload/' . $firstImage) }}" alt="{{ $paket->nama_paket }}">
                        @else
                            <div class="no-image-placeholder">
                                <i class="fa fa-image"></i>
                            </div>
                        @endif
                        <span class="package-badge {{ $paket->available == 1 ? 'badge-active' : 'badge-inactive' }}">
                            <i class="fa {{ $paket->available == 1 ? 'fa-check' : 'fa-times' }}"></i>
                            {{ $paket->available == 1 ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>
                    </div>
                    <div class="package-body">
                        <div class="package-header">
                            <span class="package-category"><i class="fa fa-tag"></i> {{ $paket->kategori ?? 'N/A' }}</span>
                        </div>
                        <h3 class="package-name">{{ $paket->nama_paket }}</h3>
                        <div class="package-price">Rp {{ number_format($paket->harga_paket ?? 0, 0, ',', '.') }}</div>
                        <p class="package-desc">{{ Str::limit($paket->deskripsi, 100) }}</p>
                    </div>
                    <div class="package-footer">
                        <button type="button" class="btn-card btn-edit-card" data-toggle="modal" data-target="#editPaketModal"
                            data-id="{{ $paket->id }}"
                            data-nama="{{ $paket->nama_paket }}"
                            data-kategori="{{ $paket->kategori }}"
                            data-harga="{{ $paket->harga_paket }}"
                            data-deskripsi="{{ $paket->deskripsi }}"
                            data-available="{{ $paket->available }}">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button type="button" class="btn-card btn-delete-card" onclick="confirmDelete({{ $paket->id }}, '{{ $paket->nama_paket }}')">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
                @empty
                <div class="empty-container">
                    <div class="empty-icon">
                        <i class="fa fa-cube"></i>
                    </div>
                    <h3>Belum Ada Paket</h3>
                    <p>Klik tombol "Tambah Paket" untuk membuat paket baru</p>
                    <button type="button" class="btn-add-empty" data-toggle="modal" data-target="#addPaketModal">
                        <i class="fa fa-plus"></i> Tambah Paket
                    </button>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($pakets->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-container">
                    {{-- Previous Page --}}
                    @if($pakets->onFirstPage())
                        <span class="page-link disabled"><i class="fa fa-chevron-left"></i></span>
                    @else
                        <a href="{{ $pakets->previousPageUrl() }}&per_page={{ $pakets->perPage() }}" class="page-link"><i class="fa fa-chevron-left"></i></a>
                    @endif

                    {{-- Page Numbers --}}
                    @php
                        $currentPage = $pakets->currentPage();
                        $lastPage = $pakets->lastPage();
                        $start = max(1, $currentPage - 2);
                        $end = min($lastPage, $currentPage + 2);
                    @endphp

                    @if($start > 1)
                        <a href="{{ $pakets->url(1) }}&per_page={{ $pakets->perPage() }}" class="page-link">1</a>
                        @if($start > 2)
                            <span class="page-ellipsis">...</span>
                        @endif
                    @endif

                    @for($i = $start; $i <= $end; $i++)
                        @if($i == $currentPage)
                            <span class="page-link active">{{ $i }}</span>
                        @else
                            <a href="{{ $pakets->url($i) }}&per_page={{ $pakets->perPage() }}" class="page-link">{{ $i }}</a>
                        @endif
                    @endfor

                    @if($end < $lastPage)
                        @if($end < $lastPage - 1)
                            <span class="page-ellipsis">...</span>
                        @endif
                        <a href="{{ $pakets->url($lastPage) }}&per_page={{ $pakets->perPage() }}" class="page-link">{{ $lastPage }}</a>
                    @endif

                    {{-- Next Page --}}
                    @if($pakets->hasMorePages())
                        <a href="{{ $pakets->nextPageUrl() }}&per_page={{ $pakets->perPage() }}" class="page-link"><i class="fa fa-chevron-right"></i></a>
                    @else
                        <span class="page-link disabled"><i class="fa fa-chevron-right"></i></span>
                    @endif
                </div>
                <div class="pagination-summary">
                    Halaman {{ $currentPage }} dari {{ $lastPage }}
                </div>
            </div>
            @endif
        </div>
    </section>
</main>

<!-- Add Package Modal -->
<div class="modal fade" id="addPaketModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header-custom">
                <h5 class="modal-title-custom"><i class="fa fa-plus-circle"></i> Tambah Paket Baru</h5>
                <button type="button" class="modal-close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ url('/paket/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body-custom">
                    <div class="form-group-custom">
                        <label for="add_nama_paket">Nama Paket</label>
                        <input type="text" class="form-control-custom" id="add_nama_paket" name="nama_paket" required placeholder="Contoh: Paket Wedding Premium">
                    </div>
                    <div class="form-group-custom">
                        <label for="add_kategori">Kategori</label>
                        <select class="form-control-custom" id="add_kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Wedding">Wedding</option>
                            <option value="Catering">Catering</option>
                            <option value="Conference">Conference</option>
                            <option value="Concert">Concert</option>
                            <option value="Party">Party</option>
                            <option value="Corporate">Corporate</option>
                            <option value="Rental">Rental</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label for="add_available">Status</label>
                        <select class="form-control-custom" id="add_available" name="available" required>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label for="add_harga_paket">Harga Paket (Rp)</label>
                        <input type="number" class="form-control-custom" id="add_harga_paket" name="harga_paket" required min="0" placeholder="25000000">
                    </div>
                    <div class="form-group-custom">
                        <label for="add_deskripsi">Deskripsi</label>
                        <textarea class="form-control-custom" id="add_deskripsi" name="deskripsi" rows="3" placeholder="Deskripsikan paket acara Anda..."></textarea>
                    </div>
                    <div class="form-group-custom">
                        <label for="add_gambar_paket">Foto Paket</label>
                        <div class="file-input-wrapper">
                            <input type="file" class="file-input" id="add_gambar_paket" name="gambar_paket[]" multiple accept="image/*">
                            <label for="add_gambar_paket" class="file-input-label">
                                <i class="fa fa-cloud-upload"></i>
                                <span>Pilih gambar atau drag ke sini</span>
                            </label>
                        </div>
                        <small class="form-hint">Format: JPG, PNG, GIF. Maks 2MB per gambar.</small>
                    </div>
                </div>
                <div class="modal-footer-custom">
                    <button type="button" class="btn-modal btn-cancel" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-modal btn-save"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Package Modal -->
<div class="modal fade" id="editPaketModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header-custom">
                <h5 class="modal-title-custom"><i class="fa fa-edit"></i> Edit Paket</h5>
                <button type="button" class="modal-close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ url('/paket/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body-custom">
                    <div class="form-group-custom">
                        <label for="edit_nama_paket">Nama Paket</label>
                        <input type="text" class="form-control-custom" id="edit_nama_paket" name="nama_paket" required>
                    </div>
                    <div class="form-group-custom">
                        <label for="edit_kategori">Kategori</label>
                        <select class="form-control-custom" id="edit_kategori" name="kategori" required>
                            <option value="Wedding">Wedding</option>
                            <option value="Catering">Catering</option>
                            <option value="Conference">Conference</option>
                            <option value="Concert">Concert</option>
                            <option value="Party">Party</option>
                            <option value="Corporate">Corporate</option>
                            <option value="Rental">Rental</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label for="edit_available">Status</label>
                        <select class="form-control-custom" id="edit_available" name="available" required>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label for="edit_harga_paket">Harga Paket (Rp)</label>
                        <input type="number" class="form-control-custom" id="edit_harga_paket" name="harga_paket" required min="0">
                    </div>
                    <div class="form-group-custom">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea class="form-control-custom" id="edit_deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="form-group-custom">
                        <label for="edit_gambar_paket">Ganti Foto Paket</label>
                        <div class="file-input-wrapper">
                            <input type="file" class="file-input" id="edit_gambar_paket" name="gambar_paket" accept="image/*">
                            <label for="edit_gambar_paket" class="file-input-label">
                                <i class="fa fa-cloud-upload"></i>
                                <span>Pilih gambar atau drag ke sini</span>
                            </label>
                        </div>
                        <small class="form-hint">Format: JPG, PNG, GIF. Maks 2MB.</small>
                    </div>
                </div>
                <div class="modal-footer-custom">
                    <button type="button" class="btn-modal btn-cancel" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-modal btn-save"><i class="fa fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header-custom modal-header-danger">
                <h5 class="modal-title-custom"><i class="fa fa-exclamation-triangle"></i> Konfirmasi Hapus</h5>
                <button type="button" class="modal-close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body-custom text-center">
                <div class="delete-icon">
                    <i class="fa fa-trash"></i>
                </div>
                <p>Apakah Anda yakin ingin menghapus paket <strong id="delete_paket_name"></strong>?</p>
                <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
            </div>
            <div class="modal-footer-custom justify-center">
                <button type="button" class="btn-modal btn-cancel" data-dismiss="modal">Batal</button>
                <a href="#" id="confirm_delete_btn" class="btn-modal btn-delete"><i class="fa fa-trash"></i> Hapus</a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/manage-paket-inline.js') }}"></script>
@endpush
