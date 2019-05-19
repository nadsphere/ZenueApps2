
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Edit Profil User</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
      .img-circle{
        width: 160px;
        height: 160px;
      }
      .txt-small{
          font-size: 14px;
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
                                        <p>Anda Menerima Pembayaran dari Customer..</p>
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
                                        <p>Dapatkan Penawaran Menarik..</p>
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
              <li><a href="#about">Paket</a></li>
              <li class="drop-down"><a href="index.html"><span>Jono Organizer</span></a>
                <ul>
                  <li><a href="#">Atur EO</a></li>
                  <li><a href="#">Pengriman</a></li>
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="index.html">Sign Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
</header>
<div class="theme-layout">
  <section class="container-fluid section-bg2">
      <br />  <br />  <br /> <br />
            <div class="row merged">
                <div class="col-lg-1"></div>
                <div class="col-lg-3 col-sm-4">
                        <div class="col-md-12">
                            <div class="col-sm-12">
                                    <div class="row">
                                    <div class="card mb-4">
                                            <div class="card-body">
                                                    <div class="card-body text-center">
                                                            <img src="{{ asset('img/EO/eo-2.jpg') }}" alt="Kathy Davis" class="img-fluid rounded-circle mb-2 img-circle">
                                                            <br />
                                                            <p class="txt-small text-muted text-center">Ukuran gambar: maks. 1 MB <br /> Format gambar: .JPEG, .PNG</p>
                                                            {{-- <a class="btn btn-outline-info btn-md" href="#">Edit Profile</a> --}}
                                                            <form>
                                                                <div class="form-group row">
                                                                    <input type="file" class="btn-ouline-info form-control-file" id="gambar_profil">
                                                                </div>
                                                            </form>
                                                    </div>
                                            </div>
                                        </div>
                                    <div class="card mb-4 col-sm-12">
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-1">
                                                    <i class="fa fa-file-o"></i> Transaksi
                                                    </li><br />
                                                    <li class="mb-1">
                                                        <i class="fa fa-sliders"></i> Iklan
                                                    </li><br />
                                                    <li class="mb-1">
                                                        <i class="fa fa-question-circle"></i> Cara Bermitra
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
                            <div class="card-body ">  
                                <div class="col-md-12 order-md-1">
                                    <h4 class="mb-3 text-center"><b> Ubah Profil </b></h4> <br />
                                    <form>
                                        <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label"><b>Nama EO </b></label>
                                        <div class="col-sm-9">
                                            <input type="text" id="nama" readonly class="form-control-plaintext" id="nama" value="Jojo Organizer">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label"><b> Email</b></label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" id="email inputPassword3" placeholder="">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kontak" class="col-sm-3 col-form-label"><b>Kontak</b></label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kontak" id="kontak" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamats" class="col-sm-3 col-form-label"><b>Alamat</b></label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" id="alamats" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="linkk" class="col-sm-3 col-form-label"><b>Link</b></label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control-plaintext" value="www.jono-organizer.com" name="link" id="link" placeholder="">
                                                </div>
                                            </div>
                                        {{-- <div class="form-group row">
                                            <label for="deskripsi" class="col-sm-3 col-form-label"><b>Deskripsi</b></label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control-plaintext" id="deskripsi" rows="3" value="Wedding, Conference" readonly>Menerima Jasa Event MC, singer, make-up, fotografi, dancer, magcian, model, usher, band. Jakarta, Bandung dan luar kota lainnya. BASE DI JAKARTA MC, Singer, Fotografi, Videographer, Band, DJ, dll</textarea>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="layanan" class="col-sm-3 col-form-label"><b>Layanan</b></label>
                                            <div class="col-sm-5">
                                            <input type="text" class="form-control-plaintext" id="layanan" placeholder="" value="Wedding, Conference" readonly>
                                            </div>
                                            <div class="col-sm-2 justify-content-center">
                                                <a class="link col-sm-2" href="#">Ubah</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-3 col-form-label"><b> Password</b></label>
                                            <div class="col-sm-5">
                                            <input type="password" class="form-control-plaintext" id="password" placeholder="" value="********" readonly>
                                            </div>
                                            <div class="col-sm-2 justify-content-center">
                                                <a class="link col-sm-2" href="#">Ubah</a>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group row justify-content-center">
                                        <div class="col-sm-10">
                                            <button class="btn btn-outline-danger btn-md btn-block" type="submit">Simpan</button>
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
</div>
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
</body>	
</html>