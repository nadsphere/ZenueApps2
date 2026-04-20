@extends('layout.app')
@section('body_class', 'is-payment')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_mtd_payment.css') }}">
@endpush
@section('content')
  <main id="main">
    <section class="section-content bg padding-y">
            <br />
        <div class="container">
          <div class="row mt-4">
              <main class="mt-4 col-lg-9 col-xl-8 col-md-7">
                  <div class="card">
                    <div class="card-header">
                        Alamat Pengiriman
                    </div>
                    <div class="card-body h-100">
                      <div class="row">
                          <article class="col-sm-6">
                                <h4 class="title font-weight-bold">Alamat Pengiriman</h4><hr>
                                <div class="mt-3">
                                    <div class="custom-control custom-radio radios">
                                        <input type="radio" name="choice-animals" id="main_addr" class="radios2 custom-control-input" checked>
                                        <label for="main_addr" class="custom-control-label">Sama dengan alamat pengiriman</label>

                                        <div class="reveal-if-active">
                                          <p class="require-if-active addr_main text-dark" data-require-pair="#main_addr" >Joko Mulyadi</p>
                                          <p class="addr_scd text-dark">(+62)81356641227</p>
                                          <p class="addr_scd text-dark">Jl Bahagia RT01/06 No.11 Kelurahan Kedong Asih Cibinong, 16112</p>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio radios">
                                        <input type="radio" name="choice-animals" id="replace_addr" class="radios2 custom-control-input">
                                        <label for="replace_addr" class="custom-control-label">Gunakan alamat lain</label>
                                        <div class="reveal-if-active form-inline">
                                          <input type="text" id="replace_addr_field" name="replace_addr" class="require-if-active form-control" data-require-pair="#replace_addr" width="100%" placeholder="Alamat">
                                        </div>
                                    </div>
                                </div>
                          </article>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-4">
                    <div class="card-header">
                        Ringkasan Belanja
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-responsive-lg shopping-cart-wrap mb-0">
                                    <thead class="text-muted">
                                      <tr>
                                        <th colspan="3" class="border-bottom mb-0">
                                          <p class="det-txt float-left text-dark font-weight-bold">EO0001</p>
                                        </th>
                                        <th colspan="2" class="border-bottom mb-0">
                                            <p class="det-txt float-right text-dark"><a href="" class="text-primary"><i class="fa fa-building mr-1"></i> Jojo Organizer</a></p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="col" class="text-dark">Paket</th>
                                        <th scope="col" class="text-dark">Deskripsi</th>
                                        <th scope="col" class="text-dark" width="120">Jumlah</th>
                                        <th scope="col" class="text-dark" width="200">Tgl. Acara</th>
                                        <th scope="col" class="text-dark" width="200">Payment Plan</th>
                                        <th></th>
                                      </tr>

                                    </thead>
                                  <tbody>
                                    <tr class="border-bottom">
                                      <td>
                                        <figure class="media">
                                          <div class="img-wrap">
                                            <img alt="paket_payment" src="{{asset('img/items/stores.png')}}" class="img-sm"></div>
                                          <figcaption class="media-body">
                                              <article class="sl-right">
                                                  <h5 class="det-tit text-dark text-truncate font-weight-bold">Paket Nikah Minimalis</h5>
                                                  <p class="det-txt text-dark"><p class="text-dark">Rp 25.000.000</p></p>
                                                </article>
                                          </figcaption>
                                        </figure>
                                      </td>
                                      <td>
                                        <p class="text-dark">Paket ini</p>
                                      </td>
                                      <td class="text-dark">1</td>
                                      <td class="text-dark">06/28/2019</td>
                                      <td class="text-dark">Pembayaran DP 10% perbulan
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="3" class="text-right border-top-0 text-dark"><strong> Subtotal</strong></td>
                                      <td colspan="2"  class="text-right text-dark">Rp 2.500.000</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
              </main>
              <main class="mt-4 col-lg-3 col-xl-4 col-md-5">
                <div class="card">
                  <div class="card-header">
                      Ringkasan Belanja
                  </div>
                  <div class="card-body h-100">
                      <div class="row">
                        <div class="col-lg-12">
                            <h5 class="title font-weight-bold">Ringkasan Belanja</h5> <hr>
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <td class="border-top-0 left text-dark">
                                  Total Paket (DP 10%)*
                                  </td>
                                  <td class="border-top-0 right text-dark"><strong> Rp 2.500.000</strong></td>
                                </tr>
                                <tr>
                                  <td class="border-top-0 left text-dark">
                                  Ongkos Jasa Antar
                                  </td>
                                  <td class="border-top-0 right text-dark"><strong> Rp 10.000 </strong></td>
                                </tr>
                                <tr class="border-top border-bottom">
                                  <td class="left text-dark">
                                  <strong>Total</strong>
                                  </td>
                                  <td class="right text-dark">
                                  <strong style="color: #c0392b">Rp 2.510.300</strong>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="left border-top-0 text-dark">
                                  Sisa Bayar
                                  </td>
                                  <td class="right border-top-0 text-dark">
                                  Rp 2.490.000
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <p class="ml-3 lead text-dark" style="font-size: 12px">*Periode pembayaran berikutnya berlaku 15-7-2019</p>

                        </div>
                      </div>
                      <div class="row mt-3">
                          <article class="col-lg-12">
                              <h5 class="title font-weight-bold">Metode Pembayaran</h5> <hr>
                                <div class="mt-3 ml-0">
                                    <div class="card" id="accordion">
                                        <div class="card-header" id="headingOne" style="background-color:#2c3e50; color:#ffffff;">
                                            <h5 class="mb-0">
                                                <button class="btn text-white" data-toggle="collapse" data-target="#collaATM" aria-expanded="true" aria-controls="collapseOne">
                                                  ATM Transfer
                                                </button>
                                              </h5>
                                        </div>
                                        <div id="collaATM" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                              <ol class="ol-list ml-3">
                                                  <li class="li-list text-dark">Harap Transfer Pesanan Anda ke: <br><strong class="text-dark">Mandiri <br> A.N: Jonathan Suryo <br>AC# 157-00-0256128-6</strong></li>
                                                  <li class="li-list text-dark">Silakan masukan kode pembayaran anda</li>
                                                  <li class="li-list text-dark">Pesanan Anda akan otomatis dibatalkan apabila tidak menerima pembayaran dalam waktu satu hari (1x24 jam)</li>
                                                  <li class="li-list text-dark">Pesanan Anda akan terverifikasi secara otomatis setelah berhasil melakukan pembayaran</li>
                                              </ol>
                                            </div>
                                        </div>

                                      </div>
                                </div>
                          </article>
                      </div>
                      <div class="mt-4 justify-content-center">
                          <a href="success_order.html" class="btn btn-danger btn-block font-weight-bold">Buat Pesanan</a>
                      </div>
                  </div>
                </div>
              </main>
          </div>
        </div> <!-- container .//  -->
        <br />
    </section>

  </main>


@endsection
