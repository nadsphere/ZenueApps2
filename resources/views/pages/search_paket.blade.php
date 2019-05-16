<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Zeninth EO - Your Event Solution</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/fix.css" rel="stylesheet" type="text/css"/>

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  

    <style>
      .fa-times-thin:before {
        content: '\00d7';
      }
    </style>

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
  <link href="css/ui.css" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }} rel="stylesheet">
</head>
<body>
    <button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>
    <header id="header" class="header-stack">
      <div class="container">
        <div class="logo float-left">
          <h1 class="text-light"><a href="{{url('/')}}" class="scrollto"><span>ZEN</span></a></h1>
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
            @if ($user == null)
          <li><a href="" class="trigger-btn" data-toggle="modal" data-target=".modalLogin">LOGIN</a></li> 
          <li><a href="" class="trigger-btn" data-toggle="modal" data-target="#modalRegist">REGISTER</a></li>
            @elseif ($user->is_eo == 1 )
          <li class="drop-down"><a href="#"><span>{{$user->name}}</span></a>
              <ul>
                <li><a href="{{url('/paket')}}">Paket</a></li>
                <li><a href="#">Pengriman</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ url('/logout') }}">Sign Out</a></li>
              </ul>
          </li>
          @elseif ($user->is_renter == 1 )
          <li class="drop-down"><a href="#"><span>{{$user->name}}</span></a>
              <ul>
                <li><a href="#">Edit Profil</a></li>
                <li><a href="#">My Order</a></li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="{{ url('/logout') }}">Sign Out</a></li>
              </ul>
          </li>
          @endif
          </ul>
        </nav>
      </div>
    </header>
  <main id="main">
      <br /><br />
    <section class="bg-white padding-y">
        <div class="container">
            <br /><br />

            <div class="row">
                <aside class="col-sm-3">
                    <h5><i class="fa fa-filter"></i> <b> Filter</b></h5>
                    <div class="card card-filter">
                        <article class="card-group-item bg-white">
                            <header class="card-header">
                                <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                                    <i class="icon-action fa fa-chevron-down"></i>
                                    <h6 class="title">Kategori</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse22">
                                    <div class="card-body">
                                    <form>
                                        <label class="form-check">
                                            <input class="form-check-input" value="" type="checkbox">
                                            <span class="form-check-label">
                                                Wedding
                                            </span>
                                        </label> 
                                        <label class="form-check">
                                            <input class="form-check-input" value="" type="checkbox">
                                            <span class="form-check-label">
                                                Catering
                                            </span>
                                        </label> 
                                        <label class="form-check">
                                            <input class="form-check-input" value="" type="checkbox">
                                            <span class="form-check-label">
                                                Party
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" value="" type="checkbox">
                                            <span class="form-check-label">
                                                Concert
                                            </span>
                                        </label> 
                                        <label class="form-check">
                                            <input class="form-check-input" value="" type="checkbox">
                                            <span class="form-check-label">
                                                Conference
                                            </span>
                                        </label>  <!-- form-check.// -->
                                        <label class="form-check">
                                            <input class="form-check-input" value="" type="checkbox">
                                            <span class="form-check-label">
                                                Rental
                                            </span>
                                        </label>  <!-- form-check.// -->
                                    </form>
                                    </div> <!-- card-body.// -->
                            </div>
                        </article>
                        <article class="card-group-item">
                                <header class="card-header">
                                    <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse33">
                                        <i class="icon-action fa fa-chevron-down"></i>
                                        <h6 class="title">Lokasi</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse33">
                                        <div class="card-body">
                                        <form>
                                            <label class="form-check">
                                                <input class="form-check-input" value="" type="checkbox">
                                                <span class="form-check-label">
                                                    Bogor
                                                </span>
                                            </label> 
                                            <label class="form-check">
                                                <input class="form-check-input" value="" type="checkbox">
                                                <span class="form-check-label">
                                                    Jakarta
                                                </span>
                                            </label> 
                                            <label class="form-check">
                                                <input class="form-check-input" value="" type="checkbox">
                                                <span class="form-check-label">
                                                    Depok
                                                </span>
                                            </label>
                                        </form>
                                        </div> <!-- card-body.// -->
                                </div>
                        </article>
                        <article class="card-group-item">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse44">
                                    <i class="icon-action fa fa-chevron-down"></i>
                                    <h6 class="title">Harga</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse44">
                                <div class="card-body">
                                    <div class="form-row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Rp Minimal" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Rp Maximal" type="text">
                                    </div>
                                    </div> <!-- form-row.// -->
                                    <button class="btn btn-danger">Terapkan</button>
                                </div> <!-- card-body.// -->
                            </div> <!-- collapse .// -->
                        </article>
                    </div>
                </aside>
                <main class="col-sm-9">
                    <div class="padding-y-sm">
                        <span><b>{{ $count_search_paket }}</b> results for "{{ $search }}"</span>	
                        <form class="form-inline float-right">
                                <div class="form-group>
                                  <label for="urut" class="">Urutkan </label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="urut">
                                      <option>Nama</option>
                                      <option>Kategori</option>
                                      <option>Status</option>
                                      <option>Harga</option>
                                    </select>
                                </div>
                        </form>
                    </div>
                    <br>

                    @foreach ($search_paket as $value)
                    <article class="card card-product">
                            <div class="card-body">
                                <div class="row">
                                    <aside class="col-sm-3">
                                    @php $images_paket = json_decode($value->gambar_paket)@endphp
                                        <div class="img-wrap"><img class="img-wrap" alt="{{$value->gambar_paket}}" src="{{ asset('img/upload/'.$images_paket[0]) }}"></div>
                                    </aside> 
                                    <article class="col-sm-9">
                                        <h4 class="title">{{$value->nama_paket}}</h4>
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
                                                <p class="title"> <b>{{$value->id_eo}}</b></p> 
                                        </div>
                                        <p class="texts">{{$value->deskripsi}}</p>
                                        <p class="texts">Rp. {{ number_format($value->harga_paket)}} ,-</p>
                                        <br>
                                        <a style="font-size:15pt" href="#" class="float-right"><i class="fa fa-heart-o"></i></a>
                                    </article>
                                </div> 
                            </div>
                    </article>
                    @endforeach
            </div>
        </div> <!-- container .//  -->
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
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
 <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
    $('.carousel').carousel({
  interval: 2000
  })
  </script>

</body>
</html>