@extends('layout.app')
@section('body_class', 'is-search')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/approve_detail.css') }}">
@endpush
@section('content')
  <main id="main">
    <section class="bg-white padding-y">
        <div class="container">
            <br /><br />

            <div class="row">
                <aside class="col-sm-3">
                    <h5 class="text-dark font-weight-bold"><i class="fa fa-filter"></i> Filter</h5>
                    <div class="card card-filter">
                        <article class="card-group-item bg-white">
                            <header class="card-header">
                                <a class="text-white" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                                    <i class="icon-action fa fa-chevron-down"></i>
                                    <h6 class="title mb-0">Kategori</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse22">
                                    <div class="card-body">
                                    <form>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="kategori" id="kat_wedding" value="wedding">
                                        <label class="form-check-label text-dark" for="kat_wedding">Wedding</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="kategori" id="kat_catering" value="catering">
                                        <label class="form-check-label text-dark" for="kat_catering">Catering</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="kategori" id="kat_party" value="party">
                                        <label class="form-check-label text-dark" for="kat_party">Party</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="kategori" id="kat_concert" value="concert">
                                        <label class="form-check-label text-dark" for="kat_concert">Concert</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="kategori" id="kat_conference" value="conference">
                                        <label class="form-check-label text-dark" for="kat_conference">Conference</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="kategori" id="kat_rental" value="rental">
                                        <label class="form-check-label text-dark" for="kat_rental">Rental</label>
                                    </div>
                                    </form>
                                    </div> <!-- card-body.// -->
                            </div>
                        </article>
                        <article class="card-group-item">
                                <header class="card-header">
                                    <a class="text-white" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse33">
                                        <i class="icon-action fa fa-chevron-down"></i>
                                        <h6 class="title mb-0">Lokasi</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse33">
                                        <div class="card-body">
                                        <form>
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="radio" name="lokasi" id="lok_bogor" value="bogor">
                                                <label class="form-check-label text-dark" for="lok_bogor">Bogor</label>
                                            </div>
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="radio" name="lokasi" id="lok_jakarta" value="jakarta">
                                                <label class="form-check-label text-dark" for="lok_jakarta">Jakarta</label>
                                            </div>
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="radio" name="lokasi" id="lok_depok" value="depok">
                                                <label class="form-check-label text-dark" for="lok_depok">Depok</label>
                                            </div>
                                          </form>
                                        </div> <!-- card-body.// -->
                                </div>
                        </article>
                        <article class="card-group-item">
                            <header class="card-header">
                                <a class="text-white" href="#" data-toggle="collapse" data-target="#collapse44">
                                    <i class="icon-action fa fa-chevron-down"></i>
                                    <h6 class="title mb-0">Harga</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse44">
                                <div class="card-body">
                                    <div class="form-row">
                                    <div class="form-group">
                                        <input class="form-control text-dark" placeholder="Rp Minimal" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control text-dark" placeholder="Rp Maximal" type="text">
                                    </div>
                                    </div> <!-- form-row.// -->
                                    <button class="btn btn-danger">Terapkan</button>
                                </div> <!-- card-body.// -->
                            </div> <!-- collapse .// -->
                        </article>
                    </div>
                </aside>
                <main class="col-sm-9">
                    <div class="padding-y-sm">
                        <span class="text-dark font-weight-bold"><b>{{ $count_search_paket }}</b> hasil untuk "{{ $search }}"</span>
                        <form class="form-inline float-right">
                                <div class="form-group">
                                  <label for="urut" class="text-dark font-weight-bold">Urutkan </label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="urut">
                                      <option>Nama</option>
                                      <option>Kategori</option>
                                      <option>Status</option>
                                      <option>Harga</option>
                                    </select>
                                </div>
                        </form>
                    </div>
                    <br>

                    @foreach ($search_paket as $value)
                    <article class="card card-product">
                            <div class="card-body">
                                <div class="row">
                                    <aside class="col-sm-3">
                                        @php $images_paket = json_decode($value->gambar_paket)@endphp
                                        <div class="img-wrap"><img class="img-wrap" alt="{{$value->gambar_paket}}" src="{{ asset('img/upload/'.$images_paket[0]) }}"></div>
                                    </aside>
                                    <article class="col-sm-9">
                                    <a class="card-product-result" href="{{ url('/detail_paket/'.$value->id) }}">
                                        <h4 class="title font-weight-bold">{{$value->nama_paket}}</h4>
                                        <div class="rating-wrap mb-2">
                                                <ul class="rating-stars">
                                                    <li style="width:90%" class="stars-active">
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                </ul>
                                                <div class="label-rating text-dark"><b> (125)</b></div>
                                                <p class="title text-dark"> <b>{{$value->id_eo}}</b></p>
                                        </div>
                                        <p class="texts">{{$value->deskripsi}}</p>
                                        <p class="text-dark font-weight-bold">Rp. {{ number_format($value->harga_paket)}} ,-</p>
                                        <a href="#" class="btn btn-outline-danger">Ambil Penawaran</a>
                                        <br>
                                        <a style="font-size:15pt" href="#" class="search-icon-wishlist"><i class="fa fa-heart"></i></a>
                                    </a>
                                    </article>
                                </div>
                            </div>
                    </article>
                    @endforeach
            </div>
        </div>
    </section>

  </main>
@endsection
