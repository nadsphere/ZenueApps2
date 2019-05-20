<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengambilan Paket</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/ui.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fix.css" rel="stylesheet" type="text/css"/>
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

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
                            <span class="notification__category">Order</span>
                            <p>Penawaran Paket Anda Diterima</p>
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
            <li class="drop-down"><a href="index.html"><span>JOKO MULYADI</span></a>
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
        <section class="container">
            <br />  <br />  <br /> <br />
            <div class=" bg-white" style="margin-top:50px">
                    <br /><br />  
                    <header class="section-header">
                        <h3 class="title">Form Ambil Paket</h3>
                    </header>
                    <br /><br />
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <form action="">
                                <div class="form-group row">
                                    <label for="nama_cust" class="col-sm-3 col-form-label"><b> Nama Pembeli</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" id="nama_cust" value="Joko Mulyadi" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label"><b> Email</b></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" placeholder="" name="email" value="jokomul13@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telpon" class="col-sm-3 col-form-label"><b> Nomor Telepon</b></label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" name="no_telpon" id="telpon" placeholder="0813xxxx" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_book" class="col-sm-3 col-form-label"><b> Kode Booking</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" value="EO-1234567" id="kode_book" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-3 col-form-label"><b> Nama Paket yang Diambil</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="" name="email" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="des_pkt" class="col-sm-3 col-form-label"><b>Deskripsi</b></label>
                                    <div class="col-sm-9">
                                        <textarea name="deskrisi_pkt" class="form-control" name="" id="des_pkt" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-3 col-form-label"><b>Tanggal Ambil</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tgl_ambil" name="nama_barang" placeholder="" name="email" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_paket" class="col-sm-3 col-form-label"><b>Harga Paket</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tgl_ambil" name="nama_barang" placeholder="" name="harga_paket" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_paket" class="col-sm-3 col-form-label"><b>Pembayaran</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" id="tgl_ambil" name="nama_barang" placeholder="" name="harga_paket" value="Transfer" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_paket" class="col-sm-3 col-form-label"><b>Status Pembayaran</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" id="tgl_ambil" name="nama_barang" placeholder="" name="harga_paket" value="Sudah Membayar Uang Penuh" readonly>
                                    </div>
                                </div>
                                <br />
                                <div class="text-center">
                                    <button class="btn btn-outline-danger" type="reset">Kembali</button>
                                    <button class="btn btn-danger" type="submit">Ambil Paket</button>
                                </div>
                                <br /><br />
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <br />
            </div>
             <div class=" bg-white" style="margin-top:50px">
                    <br /><br />  
                    <header class="section-header">
                        <h3 class="title">Form Ambil Paket</h3>
                    </header>
                    <br /><br />
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <form action="">
                                <div class="form-group row">
                                    <label for="nama_cust" class="col-sm-3 col-form-label"><b> Nama Pembeli</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" id="nama_cust" value="Joko Mulyadi" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label"><b> Email</b></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" placeholder="" name="email" value="jokomul13@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telpon" class="col-sm-3 col-form-label"><b> Nomor Telepon</b></label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" name="no_telpon" id="telpon" placeholder="0813xxxx" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_book" class="col-sm-3 col-form-label"><b> Kode Booking</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" value="EO-1234567" id="kode_book" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-3 col-form-label"><b> Nama Paket yang Diambil</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="" name="email" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="des_pkt" class="col-sm-3 col-form-label"><b>Deskripsi</b></label>
                                    <div class="col-sm-9">
                                        <textarea name="deskrisi_pkt" class="form-control" name="" id="des_pkt" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-3 col-form-label"><b>Tanggal Ambil</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tgl_ambil" name="nama_barang" placeholder="" name="email" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_paket" class="col-sm-3 col-form-label"><b>Harga Paket</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tgl_ambil" name="nama_barang" placeholder="" name="harga_paket" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_paket" class="col-sm-3 col-form-label"><b>Pembayaran</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" id="tgl_ambil" name="nama_barang" placeholder="" name="harga_paket" value="Transfer" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_paket" class="col-sm-3 col-form-label"><b>Status Pembayaran</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" id="tgl_ambil" name="nama_barang" placeholder="" name="harga_paket" value="Sudah Membayar Uang Penuh" readonly>
                                    </div>
                                </div>
                                <br />
                                <div class="text-center">
                                    <button class="btn btn-outline-danger" type="reset">Kembali</button>
                                    <button class="btn btn-danger" type="submit">Ambil Paket</button>
                                </div>
                                <br /><br />
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <br />
            </div>
        </section>
        <br /><br /><br /><br /><br />
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

  <script src="../../dist/js/demo.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
