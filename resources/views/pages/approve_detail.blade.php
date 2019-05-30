<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Notifikasi</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
                            <i class="fa fa-exclamation-triangle"></i>
                          </div>
                        </div>
                        <div class="notification__content">
                          <span class="notification__category">Payment</span>
                          <p>Anda Membatalkan Pembayaran Customer...</p>
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
                          <span class="notification__category">Order</span>
                          <p>Customer #ID0012 mengonfirmasi pembayaran uang muka</p>
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
                          <span class="notification__category">Payment</span>
                          <p>Anda menerima pesanan Customer ID #ID0001</p>
                        </div>
                      </a>
                </li>
                <hr>
                <li>
                  <a href="" class="dropdown-item notification__all text-muted text-center">Lihat Semua</a>
                    <!-- <a class="dropdown-item notification__all text-center" href="#"> Lihat Semua </a> -->
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
            <li class="drop-down"><a href="index.html"><span>JONO ORGANIZER</span></a>
                <ul>
                  <li><a href="#">Atur EO</a></li>
                  <li><a href="#">Pengiriman</a></li>
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="index.html">Sign Out</a></li>
                </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <main id="main" class="section-bg2">
        <section class="section-content padding-y">
                <br /><br /><br /><br />
            <div class="container">
              <div class="row">
                <a href="transacts" class="btn rounded"><i class="fa fa-chevron-left" style="color:black"></i></a>
              </div>
              <br>
              <div class="row">
                <br />
                  <main class="col-md-6 col-lg-12">
                    <div class="row">
                      <div class="card col-sm-6 col-md-12">
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
                                                  <h5 class="title">Detail Pelanggan</h5> <br>
                                                  <p ><strong> Joko Mulyadi</strong></p>
                                                  <p >6281356641227</p>
                                                  <p>Jl Bahagia RT01/06 No.11 Kelurahan Kedong Asih Cibinong, 16112</p>
                                            </article>
                                        </div><hr>
                                        <div class="row">
                                            <article class="col-sm-7 ">
                                                <br>
                                                  <h5 class="title">Item</h5> <br>
                                                  <div class="row col-sm-7">
                                                    <aside class="col-xs-3">
                                                        <img src="{{asset('img/paket/weds.jpg')}}" class="rounded img-responsive" width="50px" alt="">
                                                    </aside>
                                                    <main class="col-xs-9">
                                                      <p ><strong> Paket Nikah Minimalis</strong></p>
                                                      <p >Qty: 1</p>
                                                      <p class="float-right">Rp 25000000</p>
                                                    </main>
                                                  </div>
                                                  
                                                  
                                            </article>
                                                <article class="col-sm-4 border-left">
                                                <br>
                                                  <p><strong>Subtotal Layanan</strong> <span class="float-right"> 25000000</span></p>
                                                  <p><strong>Biaya Jasa</strong> <span class="float-right"> 10000</span></p>
                                                  <hr>
                                                  <p><strong>Total</strong> <span class="float-right"> 25010000</span></p>
                                                  <br>
                                                  <p><strong>Uang Muka (10%)</strong> <span class="float-right"> 2501000</span></p>
                                                </article>
                                        </div>
                                        </main>
                                        <br /> 
                                        <div class="row text-center"><span>
                                            <a href="" class="btn btn-success btn-block-lg" style="width:250px; white-space: nowrap">Accept</a>
                                            <a href="" class="btn btn-danger btn-block-lg" style="width:200px">Reject</a></span>
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


      
  <!-- ./wrapper -->

  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
