
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
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/jangandiubah.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/color.css"> -->
    <link rel="stylesheet" href="css/responsive.css">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
      .img-circle{
        width: 100px;
        height: 100px;
      }
    </style>
</head>
<body>
<!--<div class="se-pre-con"></div>-->
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
        <li>
            <a href="#" class="widget-header mr-3">
              <i style="font-size: 16pt" class="icon fa fa-bell-o"></i>
            </a>
        </li>
        <li>
            <div class="input-group">
                <div class="form-group has-search">
                    <span class="fa fa-glip fa-search form-control-feedback"></span>
                    <input type="text" class="form-controls form-control" placeholder="Cari...">
                </div>
            </div>
        </li>
        <!-- <li><a href="after-login.html">Iklan</a></li> -->
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
                      <div class="card-body ">  
                      <div class="col-md-12 order-md-1">
                            <h4 class="mb-3 text-center"><b> Ubah Profil </b></h4> <br />
                            <form>
                                <div class="form-group row">
                                  <label for="name" class="col-sm-3 col-form-label"><b>Nama</b></label>
                                  <div class="col-sm-9">
                                    <input type="text" id="name" name="name" readonly class="form-control-plaintext" id="name" value="Joko Mulyadi">
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
                                      <textarea class="form-control" name="alamats" id="exampleFormControlTextarea1" rows="3"></textarea>
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