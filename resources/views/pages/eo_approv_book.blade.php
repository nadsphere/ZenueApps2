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
    <br>
      <section class="section-content bg padding-y">
          <br /><br /><br />
      <div class="container">
        <div class="card">
            <div class="card-body h-100">
                <br /><br />  
                <header class="section-header">
                  <h3 class="title">Booking</h3>
                </header>
                <br /><br />
                <div class="row-sm">
                  <div class="col-lg-4 col-md-5"></div>
                  <div class="col-lg-8 col-md-5">
                      <form class="form-inline float-right">
                          <div class="form-group mb-2">
                            <label for="urut" class="">Urut Berdasarkan</label>
                          </div>
                          <div class="form-group mx-sm-1 mb-2" style="margin-left:15px">
                              <select class="form-control" id="urut">
                                <option>ID Booking</option>
                                <option>Booking Status</option>
                                <option>Total</option>
                                <option>Nama User</option>
                              </select>
                          </div>
                      </form>         
                    </p>                      
                  </div>    
                </div>
                <br>
                <div class="row-sm">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="prd-name">ID Booking</th>
                                    <th class="prd-cate">User</th>
                                    <th class="prd-dsc">Total (Rp)</th>
                                    <th class="prd-prc">Tgl Booking</th>
                                    <th class="prd-prc">Tgl Diterima</th>
                                    <th class="prd-name">Booking Status</th>
                                    <th class="prd-name">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                  <td class="prd-name">EO0001</td>
                                  <td class="prd_cate">Jono Triyono</td>
                                  <td class="prd-sta">Rp 25.000.000</td>
                                  <td class="prd-prc">05/15/2019</td>
                                  <td class="prd-prc">05/19/2019</td>
                                  <td class="prd-pr"><span class="highlight high-approve">Accept</span></td>
                                  <td class="prd-name">
                                    <a href="approve_book/details" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-sm btn-success">Accept</a>
                                    <a href="" class="btn btn-sm btn-danger">Reject</a>
                                  </td>
                            </tr>
                            </tbody>
                        </table>
                      </div>
                </div>
                </div>
                <br />
            </div>
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


      
  <!-- ./wrapper -->

  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
