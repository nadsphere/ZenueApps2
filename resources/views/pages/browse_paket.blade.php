@extends('layout.app')
@section('body_class', 'is-package')
@section('head')
<link rel="stylesheet" href="{{ asset('css/browse_paket.css') }}">
@endsection
@section('content')
<main id="main">
    <section class="browse-page">
        <div class="container">
            <!-- Page Header Card -->
            <div class="page-header-card">
                <div class="card" style="border: none; box-shadow: 0 4px 15px rgba(44,62,80,0.08);">
                    <div style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 20px 24px; border-radius: 12px;">
                        <div style="display: flex; align-items: center; gap: 14px;">
                            <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-compass" style="font-size: 24px; color: white;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 22px; font-weight: 700; margin: 0; color: white;">Jelajahi Paket</h3>
                                <p style="font-size: 14px; margin: 6px 0 0; color: rgba(255,255,255,0.8);">Temukan paket terbaik untuk acara Anda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success-modern">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger-modern">{{ session('error') }}</div>
            @endif

            <!-- Filter Bar -->
            <form id="filterForm">
                <div class="filter-bar">
                    <div class="filter-row">
                        <div class="search-box">
                            <i class="fa fa-search"></i>
                            <input type="text" id="searchInput" name="search" placeholder="Cari paket atau EO..." value="{{ request('search') }}">
                        </div>
                        <select name="kategori" id="kategoriSelect" class="filter-select">
                            <option value="">Semua Kategori</option>
                            <option value="Wedding" {{ request('kategori') == 'Wedding' ? 'selected' : '' }}>Wedding</option>
                            <option value="Party" {{ request('kategori') == 'Party' ? 'selected' : '' }}>Party</option>
                            <option value="Concert" {{ request('kategori') == 'Concert' ? 'selected' : '' }}>Concert</option>
                            <option value="Conference" {{ request('kategori') == 'Conference' ? 'selected' : '' }}>Conference</option>
                            <option value="Catering" {{ request('kategori') == 'Catering' ? 'selected' : '' }}>Catering</option>
                            <option value="Rental" {{ request('kategori') == 'Rental' ? 'selected' : '' }}>Rental</option>
                        </select>
                        <select name="sort" id="sortSelect" class="filter-select">
                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                            <option value="harga_asc" {{ request('sort') == 'harga_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                            <option value="harga_desc" {{ request('sort') == 'harga_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                        </select>
                    </div>
                </div>
            </form>

            <!-- Package Grid -->
            <div class="package-grid" id="packageGrid">
                @include('pages.includes.package_grid', ['pakets' => $pakets, 'userRatings' => $userRatings])
            </div>

            <!-- Pagination -->
            <div id="paginationWrapper" class="pagination-wrapper">
                @if($pakets->hasPages())
                    {{ $pakets->appends(request()->query())->links('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </section>
</main>
@endsection

<!-- Rating Modals (outside grid) -->
@foreach($pakets as $paket)
    @if(Auth::guard('users')->check())
        <div class="modal fade" id="ratingModal{{ $paket->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white;">
                        <h5 class="modal-title">
                            <i class="fa fa-star"></i> Beri Rating
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: white;">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('/paket/rate') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <p><strong>{{ $paket->nama_paket }}</strong></p>
                            <div class="rating-stars">
                                @for($i = 5; $i >= 1; $i--)
                                    <label for="star{{ $i }}_{{ $paket->id }}">
                                        <i class="fa fa-star"></i>
                                    </label>
                                    <input type="radio" name="rating" id="star{{ $i }}_{{ $paket->id }}" value="{{ $i }}" {{ isset($userRatings[$paket->id]) && $userRatings[$paket->id] == $i ? 'checked' : '' }}>
                                @endfor
                            </div>
                            <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                            <div class="form-group mt-3">
                                <label>Review (opsional)</label>
                                <textarea name="review" class="form-control" rows="3" placeholder="Tulis review Anda...">{{ isset($userRatings[$paket->id]) ? ($paket->ratings->where('user_id', Auth::guard('users')->user()->id)->first()->review ?? '') : '' }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-save"></i> Simpan Rating
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endforeach

@push('scripts')
<script src="{{ asset('js/browse-paket-inline.js') }}"></script>
</script>
@endpush
