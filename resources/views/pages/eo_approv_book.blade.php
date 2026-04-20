@extends('layout.app')
@section('body_class', 'is-eo-approv')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/eo_approv_book.css') }}">
@endpush
@section('content')
    <main id="main">
        <section class="section-content padding-y">
                <br /><br /><br /><br />
            <div class="container">
              <div class="row">
                <a href="transacts" class="btn rounded"><i class="fa fa-chevron-left text-dark"></i></a>
              </div>
              <br>
              <div class="row">
                <br />
                  <main class="col-md-6 col-lg-12">
                    <div class="row">
                      <div class="card col-sm-6 col-md-12">
                                  <div class="card-header">
                                      BK001 - Detail Booking
                                  </div>
                                  <div class="card-body h-100">
                                      <main class="">
                                        <div class="row">
                                          <aside class="col-sm-3">
                                            <h3 class="title"> BK001</h3> <hr>
                                          </aside>
                                        </div>
                                        <div class="row">
                                            <article class="col-sm-6">
                                                <br>
                                                  <h5 class="title font-weight-bold">Detail Pelanggan</h5> <br>
                                                  <p class="text-dark"><strong> Joko Mulyadi</strong></p>
                                                  <p class="text-dark">6281356641227</p>
                                                  <p class="text-dark">Jl Bahagia RT01/06 No.11 Kelurahan Kedong Asih Cibinong, 16112</p>
                                            </article>
                                        </div><hr>
                                        <div class="row">
                                            <article class="col-sm-7 ">
                                                <br>
                                                  <h5 class="title font-weight-bold">Item</h5> <br>
                                                  <div class="row col-sm-7">
                                                    <aside class="col-xs-3">
                                                        <img src="{{asset('img/paket/weds.jpg')}}" class="rounded img-responsive" width="50px" alt="">
                                                    </aside>
                                                    <main class="col-xs-9">
                                                      <p class="text-dark"><strong> Paket Nikah Minimalis</strong></p>
                                                      <p class="text-dark">Qty: 1</p>
                                                      <p class="text-dark float-right">Rp 25000000</p>
                                                    </main>
                                                  </div>


                                            </article>
                                                <article class="col-sm-4 border-left">
                                                <br>
                                                  <p class="text-dark"><strong>Subtotal Layanan</strong> <span class="float-right"> 25000000</span></p>
                                                  <p class="text-dark"><strong>Biaya Jasa</strong> <span class="float-right"> 10000</span></p>
                                                  <hr>
                                                  <p class="text-dark"><strong>Total</strong> <span class="float-right"> 25010000</span></p>
                                                  <br>
                                                  <p class="text-dark"><strong>Uang Muka (10%)</strong> <span class="float-right"> 2501000</span></p>
                                                </article>
                                        </div>
                                        </main>
                                        <br />
                                        <div class="row text-center"><span>
                                            <a href="" class="btn btn-success btn-lg" style="width:250px; white-space: nowrap">Terima</a>
                                            <a href="" class="btn btn-danger btn-lg" style="width:200px">Tolak</a></span>
                                        </div>
                                  </div>
                      </div>
                    </div>
                    <br />
                  </main>

              </div>
            </div>
            <br />
            </section>

    </main>


@endsection
