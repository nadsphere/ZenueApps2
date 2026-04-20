@extends('layout.app')
@section('body_class', 'is-eo-edit')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/eo_editprofile.css') }}">
@endpush
@section('content')
    <main id="main">
        <section class="container-fluid">
            <br />  <br />  <br /> <br />
                  <div class="row merged">
                      <div class="col-lg-1"></div>
                      <div class="col-lg-3 col-sm-4">
                              <div class="col-md-12">
                                  <div class="col-sm-12">
                                          <div class="row">
                                          <div class="card mb-4">
                                                  <div class="card-header">
                                                      Foto Profil
                                                  </div>
                                                  <div class="card-body">
                                                          <div class="card-body text-center">
                                                                  <img src="{{ asset('img/EO/eo-2.jpg') }}" alt="Kathy Davis" class="img-fluid rounded-circle mb-2 img-circle">
                                                                  <br />
                                                                  <h4 class="title font-weight-bold"></h4>
                                                                  <p class="txt-small text-muted text-center">Ukuran gambar: maks. 1 MB <br /> Format gambar: .JPEG, .PNG</p>
                                                                  <br />
                                                                  <form>
                                                                      <div class="form-group row">
                                                                          <input type="file" class="form-control-file" id="gambar_profil">
                                                                      </div>
                                                                  </form>
                                                          </div>
                                                  </div>
                                              </div>
                                          <div class="card mb-4 col-sm-12">
                                                  <div class="card-header">
                                                      Menu
                                                  </div>
                                                  <div class="card-body">
                                                      <ul class="list-unstyled mb-0">
                                                          <li class="mb-1">
                                                          <i class="fa fa-heart-o"></i> My Wishlist
                                                          </li><br />
                                                          <li class="mb-1">
                                                            <i class="fa fa-file-o"></i> Pesanan Saya
                                                          </li><br />
                                                          <li class="mb-1">
                                                            <i class="fa fa-credit-card"></i> Metode Pembayaran
                                                          </li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                              </div>
                      </div>
                      <div class="col-lg-7 col-sm-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Ubah Profil
                            </div>
                            <div class="card-body ">
                            <div class="col-md-12 order-md-1">
                                  <h4 class="mb-3 text-center text-dark"><b> Ubah Profil </b></h4> <br />
                                  <form>
                                      <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label"><b>Nama</b></label>
                                        <div class="col-sm-9">
                                          <input type="text" id="name" name="name" readonly class="form-control-plaintext" value="Joko Mulyadi">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="birthday" class="col-sm-3 col-form-label"><b>Tanggal Lahir</b></label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="birthday" id="birthday" placeholder="">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label"><b> Email</b></label>
                                        <div class="col-sm-9">
                                          <input type="email" class="form-control" id="email" name="email" placeholder="">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="no_phone" class="col-sm-3 col-form-label"><b>No Telp</b></label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="no_phone" id="no_phone" placeholder="">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="alamats" class="col-sm-3 col-form-label"><b>Alamat</b></label>
                                          <div class="col-sm-9">
                                            <textarea class="form-control" name="alamats" id="alamats" rows="3"></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="password" class="col-sm-3 col-form-label"><b> Password</b></label>
                                          <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="">
                                          </div>
                                      </div>
                                      <br />
                                      <div class="form-group row justify-content-center">
                                        <div class="col-sm-10">
                                          <button class="btn btn-danger btn-md btn-block font-weight-bold" type="submit">Simpan</button>
                                        </div>
                                      </div>
                                  </form>

                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-1"></div>
                  </div>
        </section>

    </main>


@endsection
