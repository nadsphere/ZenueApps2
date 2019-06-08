<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Zeninth EO - Your Event Solution</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style2.css')}}" rel="stylesheet">
  <link href="{{asset('css/ui.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/fix.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>
  <button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>
  <header id="header" class="header-stack">
      <div class="container">
        <div class="logo float-left">
          <h1 class="text-light"><a href="promaag.html" class="scrollto"><span>ZEN</span></a></h1>
        </div>
    
        <nav class="main-nav float-right d-none d-lg-block">
          <ul>
            <li>
                <a href="#" class="widget-header mr-3">
                  <i style="font-size: 16pt" class="icon fa fa-shopping-basket"></i>
                </a>
            </li>
            <li class="dropdown notifications">
                <a href="#" class="widget-header mr-3" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <i style="font-size: 16pt" class="icon fa fa-bell" ></i>
                    <span class="badge badge-pill badge-secondary">3+</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-small">
                  <li>
                      <a class="dropdown-item" href="#">
                          <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                              <i class="fa fa-times-circle"></i>
                            </div>
                          </div>
                          <div class="notification__content">
                            <span class="notification__category">Order</span>
                            <p>Pesanan Anda Dibatalkan..</p>
                          </div>
                        </a>
                  </li>
                  <hr>
                  <li>
                      <a class="dropdown-item" href="#">
                          <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                          </div>
                          <div class="notification__content">
                            <span class="notification__category">Payment</span>
                            <p>Segera lunasi pembayaran paket anda...</p>
                          </div>
                        </a>
                  </li>
                  <hr>
                  <li>
                      <a class="dropdown-item" href="#">
                          <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                              <i class="fa fa-info"></i>
                            </div>
                          </div>
                          <div class="notification__content">
                            <span class="notification__category">SEKARANG BANGET: BUY 1 GET 1!</span>
                            <p>Serbu promonya dan koleksi pilihan paket termurah..</p>
                          </div>
                        </a>
                  </li>
                  <hr>
                  <li>
                      <a class="dropdown-item" href="#">
                          <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                              <i class="fa fa-check-circle"></i>
                            </div>
                          </div>
                          <div class="notification__content">
                            <span class="notification__category">Booking Confirment</span>
                            <p>Pembayaran Anda Telah diterima</p>
                          </div>
                        </a>
                  </li>
                  <hr>
                  <li>
                    <a href="" class="dropdown-item notification__all text-muted text-center">Lihat Semua</a>
                  </li>
                </ul>
    
            </li>
            <li>
                <div class="input-group">
                    <div class="form-group has-search">
                        <span class="fa fa-glip fa-search form-control-feedback"></span>
                        <input type="text" class="form-controls form-control" placeholder="Cari...">
                    </div>
                </div>
            </li>
            <li class="drop-down"><a href="index.html"><span>Joko Mulyadi</span></a>
              <ul>
                <li><a href="#">Edit Profil</a></li>
                <li><a href="#">My Order</a></li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="index.html">Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
  </header>

  <main id="main" class="section-bg2">
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
                                                    <textarea name="deskrisi_pkt" class="form-control-plaintext" name="deskripsi" id="des_pkt" rows="3" readonly >Acara ini rencananya berkonsep ala adat dayak </textarea>
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
                                                    <!-- <input type="date" class="form-control" id="tgl_acara" value="06/28/2019" name="tanggalacara"> -->
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
                                                <button class="btn btn-success" style="white-space: nowrap" type="submit" onclick="location.href='/user/approve_book';">Terima</button>
                                                <input class="btn btn-danger" type="button" onclick="location.href='/user/approve_book';" value="Tolak" />
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
                                <!-- <tr>
                                  <td class="left font-weight-bold">
                                  ID Booking
                                  </td>
                                  <td class="right">EO0001</td>
                                </tr> -->
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
                                <tr>
                                  <td class="left font-weight-bold">
                                  Diterima Oleh
                                  </td>
                                  <td class="right"><a href="">Jojo Organizer</a></td>
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
    <footer id="footer" class="section-bg">
      <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-links">
                        <h4>Mitra EO Zen</h4>
                          <ul>
                            <li><a href="#">Cara Jual</a></li>
                            <li><a href="#">Daftar Mitra</a></li>
                            <li><a href="#">Ketentuan Dana</a></li>
                            <li><a href="#">Periklanan</a></li>
                          </ul>
                      </div>
                </div>  
                <div class="col-sm-3">
                    <div class="footer-links">
                        <h4>Lebih Tahu Zenith</h4>
                          <ul>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Layanan</a></li>
                            <li><a href="#">Syarat dan Ketentuan</a></li>
                            <li><a href="#">Kebijakan Privasi</a></li>
                          </ul>
                      </div>
                </div>
                <div class="col-sm-3">
                  <div class="footer-links">
                    <h4>Layanan Pelanggan</h4>
                      <ul>
                        <li><a href="#">Pembayaran</a></li>
                        <li><a href="#">Pengembalian Dana dan Uang</a></li>
                        <li><a href="#">Komplain</a></li>
                        <li><a href="#">Garansi</a></li>
                        <li><a href="#">FAQ</a></li>
                      </ul>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="footer-links">
                    <h4>Contact Us</h4>
                    <p>
                      Jl. Kemanggisan VII Kav. 31 <br>
                      Jakarta Selatan<br>
                      <strong>Phone:</strong> +62 (21)123456<br>
                      <strong>Email:</strong> info@example.com<br>
                    </p>
                  </div>
                </div>
            </div>
            <div class="copyright">
                <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
                <br />
                <p class="text-center">&copy; 2019 Copyright <strong>Zenith </strong>| Hak Cipta Dilindungi</p>
            </div> 
        </div>
      </div>
    </footer>
  <!-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> -->
  <!-- JavaScript Libraries -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

</body>
</html>