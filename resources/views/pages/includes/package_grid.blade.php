@forelse($pakets as $paket)
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
                $isFavorited = isset($userFavorites) && $userFavorites->contains($paket->id);
            @endphp
            @if($hasImage)
                <img src="{{ asset('img/upload/'.$uploadPath) }}" alt="{{ $paket->nama_paket }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="image-placeholder" style="display: none; background: {{ $gradient }};">
                    <i class="fa fa-image"></i>
                </div>
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
            @if(Auth::guard('users')->check())
                <button type="button" class="btn-wishlist {{ $isFavorited ? 'active' : '' }}"
                        data-paket-id="{{ $paket->id }}"
                        title="{{ $isFavorited ? 'Hapus dari Wishlist' : 'Tambah ke Wishlist' }}">
                    <i class="fa {{ $isFavorited ? 'fa-heart' : 'fa-heart-o' }}"></i>
                </button>
            @else
                <a href="{{ url('/login') }}" class="btn-wishlist" title="Tambah ke Wishlist">
                    <i class="fa fa-heart-o"></i>
                </a>
            @endif
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
                @if(Auth::guard('users')->check())
                    <button type="button" class="btn-rate" data-toggle="modal" data-target="#ratingModal{{ $paket->id }}">
                        <i class="fa fa-star"></i> Rate
                    </button>
                @else
                    <a href="{{ url('/login') }}" class="btn-rate">
                        <i class="fa fa-star"></i> Rate
                    </a>
                @endif
            </div>
        </div>
    </div>
@empty
    <div class="empty-state">
        <div class="empty-icon">
            <i class="fa fa-search"></i>
        </div>
        <h2 class="empty-title">Paket Tidak Ditemukan</h2>
        <p class="empty-text">Coba ubah filter atau kata kunci pencarian Anda.</p>
    </div>
@endforelse
