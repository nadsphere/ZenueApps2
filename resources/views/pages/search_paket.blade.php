@extends('layout.app')
@section('content')
<style>
      .fa-times-thin:before {
        content: '\00d7';
      }
</style>
<body>
  <main id="main">
      <br /><br />
    <section class="bg-white padding-y">
        <div class="container">
            <br /><br />

            <div class="row">
                <aside class="col-sm-3">
                    <h5><i class="fa fa-filter"></i> <b> Filter</b></h5>
                    <div class="card card-filter">
                        <article class="card-group-item bg-white">
                            <header class="card-header">
                                <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                                    <i class="icon-action fa fa-chevron-down"></i>
                                    <h6 class="title">Kategori</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse22">
                                    <div class="card-body">
                                    <form>
                                    <input type="radio" name="kategori" value="wedding"> Wedding<br>
                                    <input type="radio" name="kategori" value="catering"> Catering<br>
                                    <input type="radio" name="kategori" value="party"> Party<br>
                                    <input type="radio" name="kategori" value="concert"> Concert<br>
                                    <input type="radio" name="kategori" value="conference"> Conference<br>
                                    <input type="radio" name="kategori" value="rental"> Rental<br>
                                    </form>
                                    </div> <!-- card-body.// -->
                            </div>
                        </article>
                        <article class="card-group-item">
                                <header class="card-header">
                                    <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse33">
                                        <i class="icon-action fa fa-chevron-down"></i>
                                        <h6 class="title">Lokasi</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse33">
                                        <div class="card-body">
                                        <form>
                                            <input type="radio" name="lokasi" value="bogor"> Bogor<br>
                                            <input type="radio" name="lokasi" value="jakarta"> Jakarta<br>
                                            <input type="radio" name="lokasi" value="depok"> Depok<br>
                                          </form>
                                        </div> <!-- card-body.// -->
                                </div>
                        </article>
                        <article class="card-group-item">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse44">
                                    <i class="icon-action fa fa-chevron-down"></i>
                                    <h6 class="title">Harga</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse44">
                                <div class="card-body">
                                    <div class="form-row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Rp Minimal" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Rp Maximal" type="text">
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
                        <span><b>{{ $count_search_paket }}</b> results for "{{ $search }}"</span>	
                        <form class="form-inline float-right">
                                <div class="form-group">
                                  <label for="urut" class="">Urutkan </label>
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
                                        <h4 class="title">{{$value->nama_paket}}</h4>
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
                                                <div class="label-rating"><b> (125)</b></div> 
                                                <p class="title"> <b>{{$value->id_eo}}</b></p> 
                                        </div>
                                        <p class="texts">{{$value->kategori}}</p>
                                        <p class="texts">{{$value->deskripsi}}</p>
                                        <p class="texts">Rp. {{ number_format($value->harga_paket)}} ,-</p>
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
</body>
</html>
@endsection