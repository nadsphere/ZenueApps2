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
  <style>
      .ol-list{
          padding-inline-start: 0;
      }
      .ol-list li{
          text-align: justify;
      }
  </style>
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
                    <div class="card-body h-100">
                      <div class="row">
                          <article class="col-sm-6">
                                <h4 class="title">Alamat Pengiriman</h4><hr>
                                <div class="mt-3">
                                    <div class="custom-control custom-radio radios">
                                        <input type="radio" name="choice-animals" id="main_addr" class="radios2 custom-control-input" checked>
                                        <label for="main_addr" class="custom-control-label">Sama dengan alamat pengiriman</label>
                                      
                                        <div class="reveal-if-active">
                                          <p class="require-if-active addr_main" data-require-pair="#main_addr" >Joko Mulyadi</p>
                                          <p class="addr_scd">(+62)81356641227</p>
                                          <p class="addr_scd">Jl Bahagia RT01/06 No.11 Kelurahan Kedong Asih Cibinong, 16112</p>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio radios">
                                        <input type="radio" name="choice-animals" id="replace_addr" class="radios2 custom-control-input">
                                        <label for="replace_addr" class="custom-control-label">Gunakan alamat lain</label>
                                        <div class="reveal-if-active form-inline">
                                          <input type="text" id="replace_addr" name="replace_addr" class="require-if-active form-control" data-require-pair="#replace_addr" width="100%" placeholder="Alamat">
                                        </div>
                                    </div>
                                </div>
                          </article>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-responsive-lg shopping-cart-wrap mb-0">
                                    <thead class="text-muted">
                                      <tr>
                                        <th colspan="3" class="border-bottom mb-0">
                                          <p class="det-txt float-left">EO0001</p>
                                        </th>
                                        <th colspan="2" class="border-bottom mb-0">
                                            <p class="det-txt float-right"><a href="" class=""><i class="fa fa-building mr-1"></i> Jojo Organizer</a></p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="col">Paket</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col" width="120">Jumlah</th>                                      
                                        <th scope="col" width="200">Tgl. Acara</th>
                                        <th scope="col" width="200">Payment Plan</th>
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
                                                  <h5 class="det-tit text-truncate">Paket Nikah Minimalis</h5>
                                                  <p class="det-txt"><p>Rp 25.000.000</p></p>
                                                </article> 
                                          </figcaption>
                                        </figure>
                                      </td>
                                      <td>
                                        <p>Paket ini</p>
                                      </td>
                                      <td>1</td>
                                      <td>06/28/2019</td> 
                                      <td>Pembayaran DP 10% perbulan
                                      </td>                                    
                                    </tr>
                                    <tr>
                                      <td colspan="3" class="text-right border-top-0"><strong> Subtotal</strong></td>
                                      <td colspan="2"  class="text-right">Rp 2.500.000</td>
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
                  <div class="card-body h-100">
                      <div class="row">
                        <div class="col-lg-12">
                            <h5 class="title">Ringkasan Belanja</h5> <hr>
                            <table class="table table-clear">
                              <tbody>
                                <tr>
                                  <td class="border-top-0 left">
                                  Total Paket (DP 10%)*
                                  </td>
                                  <td class="border-top-0 right"><strong> Rp 2.500.000</strong></td>
                                </tr>
                                <tr>
                                  <td class="border-top-0 left">
                                  Ongkos Jasa Antar
                                  </td>
                                  <td class="border-top-0 right"><strong> Rp 10.000 </strong></td>
                                </tr>
                                <tr class="border-top border-bottom">
                                  <td class="left">
                                  <strong>Total</strong>
                                  </td>
                                  <td class="right">
                                  <strong style="color: #cc1177">Rp 2.510.300</strong>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="left border-top-0">
                                  Sisa Bayar
                                  </td>
                                  <td class="right border-top-0">
                                  Rp 2.490.000
                                  </td>
                                </tr>
                              </tbody>
                            </table> 
                            <p class="ml-3 lead" style="font-size: 12px">*Periode pembayaran berikutnya berlaku 15-7-2019</p>
                            
                        </div>
                      </div>
                      <div class="row mt-3">
                          <article class="col-lg-12">
                              <h5 class="title">Metode Pembayaran</h5> <hr>
                                <div class="mt-3 ml-0">
                                    <div class="card" id="accordion">
                                        <div class="card-header text-info">
                                            <h5 class="mb-0">
                                                <button class="btn" data-toggle="collapse" data-target="#collaATM" aria-expanded="true" aria-controls="collapseOne">
                                                  ATM Transfer
                                                </button>
                                              </h5>
                                        </div>
                                        <div id="collaATM" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                              <ol class="ol-list ml-3">
                                                  <li class="li-list">Harap Transfer Pesanan Anda ke: <br><strong>Mandiri <br> A.N: Jonathan Suryo <br>AC# 157-00-0256128-6</strong></li>
                                                  <li class="li-list">Silakan masukan kode pembayaran anda</li>
                                                  <li class="li-list">Pesanan Anda akan otomatis dibatalkan apabila tidak menerima pembayaran dalam waktu satu hari (1x24 jam)</li>
                                                  <li class="li-list">Pesanan Anda akan terverifikasi secara otomatis setelah berhasil melakukan pembayaran</li>
                                              </ol>
                                            </div>  
                                        </div>
                                                                          
                                      </div>
                                </div>                            
                          </article>
                      </div>
                      <div class="mt-4 justify-content-center">
                          <a href="success_order.html" class="btn btn-danger btn-block">Buat Pesanan</a>
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