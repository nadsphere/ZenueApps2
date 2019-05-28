<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Profil Anda</title>
  <!-- Tell the browser to be responsive to screen width -->
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
    <style>
        .img-circle{
          width: 100px;
          height: 100px;
        }
        .txt-small{
          font-size: 15px;
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
    <main id="main" class="section-bg">
            <br />  <br /> <br />
        <section class="container ">
                <div class="row">
                   <div class="col-md-12">
                        <div class="cover-photo" style="background-image: url('img/bg-1.jpg') ;">
                            <br /><br /><br /><br /><br /><br />
                            <div class="row">
                                    <div class="col-12 col-lg-4 col-xl-3 order-2 order-lg-1">
                                            <div class="card mb-4">
                                                <div class="card-body text-center">
                                                    <img src="{{ asset('img/EO/eo-2.jpg') }}" alt="Jono Organizer" class="img-fluid rounded-circle mb-2 img-circle" width="128" height="128">
                                                    <h4 class="card-title mb-0">Jono Organizer</h4>
                                                    <div class="text-muted mb-2">@JonoOrganizer</div>
                                                    <hr>
                                                    <p class="text-justify">Menerima Jasa Event MC, singer, make-up, fotografi, dancer, magcian, model, usher, band. Jakarta, Bandung dan luar kota lainnya. BASE DI JAKARTA
                                                            MC, Singer, Fotografi, Videographer, Band, DJ, dll</p>
                                                    <div>
                                                        <a class="btn btn-primary btn-sm" href="#">Ikuti</a>
                                                        <a class="btn btn-primary btn-sm" href="#">Ambil Penawaran</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="mb-1">
                                                            <p class="text-muted"><span><i class="fa fa-calendar"></i> 26 Oktober 2011</span></p>
                                                        </li>
                                                        <li class="mb-1">
                                                            <p class="text-muted"><span><i class="fa fa-location-arrow"></i> Jakarta</span></p>
                                                        </li>
                                                        <li class="mb-1">
                                                            <p class="text-muted"><span><i class="fa fa-whatsapp"></i> 081315234655</span></p>
                                                        </li>
                                                        <li class="mb-1">
                                                            <a class="link" href=""><span><i class="fa fa-globe"></i> www.jono-organizer.com</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                
                                            {{-- <div class="card mb-4">
                                                <div class="card-header">
                                                    <div class="card-actions float-right">
                                                        <div class="dropdown show">
                                                            <a href="#" data-toggle="dropdown" data-display="static">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                                    <circle cx="12" cy="12" r="1"></circle>
                                                                    <circle cx="19" cy="12" r="1"></circle>
                                                                    <circle cx="5" cy="12" r="1"></circle>
                                                                </svg>
                                                            </a>
                                
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="card-title mb-0">Following</h5>
                                                </div>
                                                <div class="card-body">
                                
                                                    <div class="media">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="56" height="56" class="rounded-circle mr-2" alt="Andrew Jones">
                                                        <div class="media-body">
                                                            <p class="my-1"><strong>Andrew Jones</strong></p>
                                                            <a class="btn btn-sm btn-outline-primary" href="#">Unfollow</a>
                                                        </div>
                                                    </div>
                                
                                                    <hr class="my-2">
                                
                                                    <div class="media">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="56" height="56" class="rounded-circle mr-2" alt="John Smit">
                                                        <div class="media-body">
                                                            <p class="my-1"><strong>John Smit</strong></p>
                                                            <a class="btn btn-sm btn-outline-primary" href="#">Unfollow</a>
                                                        </div>
                                                    </div>
                                
                                                    <hr class="my-2">
                                
                                                    <div class="media">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="56" height="56" class="rounded-circle mr-2" alt="Marie Salter">
                                                        <div class="media-body">
                                                            <p class="my-1"><strong>Marie Salter</strong></p>
                                                            <a class="btn btn-sm btn-outline-primary" href="#">Unfollow</a>
                                                        </div>
                                                    </div>
                                
                                                </div>
                                            </div> --}}

                                    </div>
                                    <div class="col-12 col-lg-8 col-xl-9 order-1 order-lg-2">
                                            <div class="card">
                                                <div class="card-body h-100">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h4 class="mb-2"><strong>Hasil Kerja</strong></h4>                      
                                                            <div class="row no-gutters mt-1">
                                                                <div class="col-3">
                                                                    <img src="img/items/cat-1.jpg" class="img-fluid pr-1" alt="Unsplash">
                                                                </div>
                                                                <div class="col-3">
                                                                    <img src="img/items/cat-1.jpg" class="img-fluid pl-1" alt="Unsplash">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                                    <hr>
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <small class="float-right text-navy">See All</small>
                                                            <h3 class="mb-2"><strong>Paket</strong></h3>
                                                            <div class="row">
                                                                    <main class="col-sm-12">
                                                                        <article class="">
                                                                            <div class="row">
                                                                                    <aside class="col-sm-3">
                                                                                        <div class="img-wrap"><img class="img-wrap" alt="gambar nikana" src="{{ asset('img/paket/weds.jpg') }}"></div>
                                                                                    </aside> 
                                                                                    <article class="col-sm-9">
                                                                                        <h4 class="title"> Paket Nikah Minimalis</h4>
                                                                                        <div class="rating-wrap mb-2">
                                                                                                <ul class="rating-stars">
                                                                                                    <li style="width:90%" class="stars-active"> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> 
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> 
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <div class="label-rating"><b> (125)</b></div>
                                                                                                <p class="title"> <b>H Dadang Organizer</b></p>
                                                                                        </div>
                                                                                        <p class="texts">Tersedia fasilitas nikah lengkap dengan harga jempolan.. </p>
                                                                                    </article>
                                                                            </div> 
                                                                            <hr>
                                                                        </article>
                                                                        <article class="">
                                                                            <div class="row">
                                                                                    <aside class="col-sm-3">
                                                                                        <div class="img-wrap"><img class="img-wrap" alt="gambar nikana" src="{{ asset('img/paket/weds.jpg') }}"></div>
                                                                                    </aside> 
                                                                                    <article class="col-sm-9">
                                                                                        <h4 class="title"> Paket Katering Diet</h4>
                                                                                        <div class="rating-wrap mb-2">
                                                                                                <ul class="rating-stars">
                                                                                                    <li style="width:85%" class="stars-active"> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> 
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> 
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <div class="label-rating"><b> (130)</b></div> 
                                                                                                <p class="title"> <b>Deden Rukmana</b></p> 
                                                                                        </div>
                                                                                        <p class="texts"> Cocok untuk Anda yang ingin menurunkan berat badan... </p>
                                                                                    </article>
                                                                            </div>
                                                                        </article>
                                                                        <hr>
                                                                        <article class="">
                                                                            <div class="row">
                                                                                    <aside class="col-sm-3">
                                                                                        <div class="img-wrap"><img class="img-wrap" alt="gambar nikana" src="{{ asset('img/paket/weds.jpg') }}"></div>
                                                                                    </aside> 
                                                                                    <article class="col-sm-9">
                                                                                        <h4 class="title"> Paket Katering Akikah</h4>
                                                                                        <div class="rating-wrap mb-2">
                                                                                                <ul class="rating-stars">
                                                                                                    <li style="width:95%" class="stars-active"> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> 
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                                                                        <i class="fa fa-star"></i> 
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <div class="label-rating"><b> (210)</b></div> 
                                                                                                <p class="title"> <b>Jojo Eats</b></p> 
                                                                                        </div>
                                                                                        <p class="texts"> Cocok untuk Anda yang ingin menurunkan berat badan... </p>
                                                                                    </article>
                                                                            </div>
                                                                        </article>
                                                                    </main> 
                                                                </div>
                                                                <br />
                                                            {{-- <div class="media mt-3">
                                                                <a class="pr-2" href="#">
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
                                                                </a>
                                                                <div class="media-body">
                                                                    <p class="text-muted">
                                                                        <strong>Marie Salter</strong><br> pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="media mt-3">
                                                                    <a class="pr-2" href="#">
                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <p class="text-muted">
                                                                            <strong>Marie Salter</strong><br> pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris.
                                                                        </p>
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <div class="media mt-3">
                                                                <a class="pr-2" href="#">
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
                                                                </a>
                                                                <div class="media-body">
                                                                    <p class="text-muted">
                                                                        <strong>Marie Salter</strong><br> pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris.
                                                                    </p>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                        </div>
                   </div>
                </div>
        </section>
    </main>
    
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br /><br /><br />
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

  <script src="../../dist/js/demo.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
