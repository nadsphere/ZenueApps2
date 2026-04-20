@extends('layout.app')
@section('body_class', 'is-approv-book-detail')
@section('content')
    <main id="main">
        <section class="section-content bg padding-y">
                <br />
            <div class="container">
              <div class="row mt-4">
                  <main class="mt-4 col-lg-9 col-xl-8 col-md-7">
                      <div class="card">
                        <div class="card-body ml-3">
                            <div class="row">
                                <aside>
                                    <h4 class="title"> Detail Pelanggan</h4> <hr>
                                </aside>
                            </div>
                            <div class="row">
                                <article class="col-sm-12 mt-1 ">
                                    <p class="mb-2"><strong> Joko Mulyadi</strong></p>
                                    <p class="mb-2">jokomul@gmail.com</p>
                                    <p class="mb-2">6281356641227</p>
                                    <p class="mb-2">Jl Bahagia RT01/06 No.11 Kelurahan Kedong Asih Cibinong, 16112</p>
                                </article>
                            </div>

                        </div>
                      </div>
                      <div class="card mt-4">
                        <div class="card-body ml-3">
                            <div class="row">
                                <aside>
                                    <h4 class="title"> EO0001</h4> <hr>
                                </aside>
                            </div>
                            <div class="row">
                                <article class="col-sm-12 mt-1">
                                        <form action="" class=" p-0" method="post">
                                                <div class="form-group row">
                                                    <label for="nama_cust" class="col-sm-4 col-md-3 col-form-label"><b> Nama Paket</b></label>
                                                    <div class="col-sm-8 col-md-9">
                                                        <input type="text" class="form-control-plaintext" id="nama_cust" value="Paket Nikah Minimalis" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-4 col-md-3 col-form-label"><b>Lokasi</b></label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" class="form-control-plaintext" id="email" value="Value Palace Jakarta" name="lokasis"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="telpon" class="col-sm-4 col-md-3 col-form-label"><b>Konsep Acara</b></label>
                                                    <div class="col-sm-7 col-md-9">
                                                        <textarea name="deskrisi_pkt" class="form-control-plaintext" name="deskripsi" id="des_pkt" rows="3" readonly >Acara ini satunya berkonsep ala adat dayak </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="kode_book" class="col-sm-4 col-md-3 col-form-label"><b> Deskripsi</b></label>
                                                    <div class="col-sm-7 col-md-9">
                                                            <textarea name="deskrisi_pkt" class="form-control-plaintext" name="deskripsi" id="des_pkt" rows="3" readonly >Acara ini lebih simple </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nama_barang" class="col-sm-4 col-md-3 col-form-label"><b> Jumlah Tamu</b></label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="number" class="form-control-plaintext" id="nama_barang" name="nama_paket" placeholder="" value="205" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tgl_ambil" class="col-sm-4 col-md-3 col-form-label"><b>Tanggal Acara</b></label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" class="form-control-plaintext" id="nama_barang" name="nama_paket" placeholder="" value="06/28/2019" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="harga_paket" class="col-sm-4 col-md-3 col-form-label"><b>Harga Paket</b></label>
                                                    <div class="col-sm-8 col-md-9">
                                                        <input type="text" class="form-control-plaintext" id="tgl_ambil" name="harga_paket" placeholder="" value="Rp 25.000.000" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="harga_paket" class="col-sm-5 col-md-3 col-form-label"><b>Informasi (Optional)</b></label>
                                                    <div class="col-sm-7 col-md-9">
                                                        <input type="text" class="form-control-plaintext" name="harga_paket" value="-" readonly>
                                                    </div>
                                                </div>
                                                <div class="col text-center mb-1">
                                                    <button class="btn btn-success" style="white-space: nowrap" type="submit" onclick="location.href='approval.html';">Terima</button>
                                                    <input class="btn btn-danger" type="button" onclick="location.href='approval.html';" value="Tolak" />
                                                </div>
                                                <br />
                                            </form>
                                </article>
                            </div>

                        </div>
                      </div>
                  </main>
                  <main class="mt-4 col-lg-3 col-xl-4 col-md-5">
                    <div class="card">
                      <div class="card-body h-100">
                          <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-clear">
                                  <tbody>
                                    <tr>
                                      <td class="border-top-0 left font-weight-bold">
                                      Status Paket
                                      </td>
                                      <td class="border-top-0 right"><span class="high-approve"> Diterima</span></td>
                                    </tr>
                                    <tr>
                                      <td class="left font-weight-bold">
                                      Tanggal Booking
                                      </td>
                                      <td class="right">05/15/2019</td>
                                    </tr>
                                    <tr>
                                      <td class="left font-weight-bold">
                                      Tanggal Diterima
                                      </td>
                                      <td class="right">05/19/2019</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
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
