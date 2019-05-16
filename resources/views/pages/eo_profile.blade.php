<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
    <link href="css/fix.css" rel="stylesheet" type="text/css"/>
    <title>Document</title>
    <style>
           
        div.cover-photo {
            background-size: cover;
            height: 300px;
        }
        .profile-photo-warp {
        position: inherit;
        }
            body{
                margin-top:20px;
                background:#eee;
            }
            
            .card {
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid #e5e9f2;
                border-radius: .2rem
            }
            
            .card>hr {
                margin-right: 0;
                margin-left: 0
            }
            
            .card>.list-group:first-child .list-group-item:first-child {
                border-top-left-radius: .2rem;
                border-top-right-radius: .2rem
            }
            
            .card>.list-group:last-child .list-group-item:last-child {
                border-bottom-right-radius: .2rem;
                border-bottom-left-radius: .2rem
            }
            
            .card-body {
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                padding: 1.25rem
            }
            
            .card-title {
                margin-bottom: .75rem
            }
            
            .card-subtitle {
                margin-top: -.375rem
            }
            
            .card-subtitle,
            .card-text:last-child {
                margin-bottom: 0
            }
            
            .card-link:hover {
                text-decoration: none
            }
            
            .card-link+.card-link {
                margin-left: 1.25rem
            }
            
            .card-header {
                padding: .75rem 1.25rem;
                margin-bottom: 0;
                color: inherit;
                background-color: #fff;
                border-bottom: 1px solid #e5e9f2
            }
            
            .card-header:first-child {
                border-radius: calc(.2rem - 1px) calc(.2rem - 1px) 0 0
            }
            
            .card-header+.list-group .list-group-item:first-child {
                border-top: 0
            }
            
            .card-footer {
                padding: .75rem 1.25rem;
                background-color: #fff;
                border-top: 1px solid #e5e9f2
            }
            
            .card-footer:last-child {
                border-radius: 0 0 calc(.2rem - 1px) calc(.2rem - 1px)
            }
            
            .card-header-tabs {
                margin-bottom: -.75rem;
                border-bottom: 0
            }
            
            .card-header-pills,
            .card-header-tabs {
                margin-right: -.625rem;
                margin-left: -.625rem
            }
            
            .card-img-overlay {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                padding: 1.25rem
            }
            
            .card-img {
                width: 100%;
                border-radius: calc(.2rem - 1px)
            }
            
            .card-img-top {
                width: 100%;
                border-top-left-radius: calc(.2rem - 1px);
                border-top-right-radius: calc(.2rem - 1px)
            }
            
            .card-img-bottom {
                width: 100%;
                border-bottom-right-radius: calc(.2rem - 1px);
                border-bottom-left-radius: calc(.2rem - 1px)
            }
            
            .card-deck {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column
            }
            
            .card-deck .card {
                margin-bottom: .75rem
            }
            
            @media (min-width:576px) {
                .card-deck {
                    -ms-flex-flow: row wrap;
                    flex-flow: row wrap;
                    margin-right: -.75rem;
                    margin-left: -.75rem
                }
                .card-deck .card {
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex: 1 0 0%;
                    flex: 1 0 0%;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    margin-right: .75rem;
                    margin-bottom: 0;
                    margin-left: .75rem
                }
            }
            
            .card-group {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column
            }
            
            .card-group>.card {
                margin-bottom: .75rem
            }
            
            @media (min-width:576px) {
                .card-group {
                    -ms-flex-flow: row wrap;
                    flex-flow: row wrap
                }
                .card-group>.card {
                    -ms-flex: 1 0 0%;
                    flex: 1 0 0%;
                    margin-bottom: 0
                }
                .card-group>.card+.card {
                    margin-left: 0;
                    border-left: 0
                }
                .card-group>.card:first-child {
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0
                }
                .card-group>.card:first-child .card-header,
                .card-group>.card:first-child .card-img-top {
                    border-top-right-radius: 0
                }
                .card-group>.card:first-child .card-footer,
                .card-group>.card:first-child .card-img-bottom {
                    border-bottom-right-radius: 0
                }
                .card-group>.card:last-child {
                    border-top-left-radius: 0;
                    border-bottom-left-radius: 0
                }
                .card-group>.card:last-child .card-header,
                .card-group>.card:last-child .card-img-top {
                    border-top-left-radius: 0
                }
                .card-group>.card:last-child .card-footer,
                .card-group>.card:last-child .card-img-bottom {
                    border-bottom-left-radius: 0
                }
                .card-group>.card:only-child {
                    border-radius: .2rem
                }
                .card-group>.card:only-child .card-header,
                .card-group>.card:only-child .card-img-top {
                    border-top-left-radius: .2rem;
                    border-top-right-radius: .2rem
                }
                .card-group>.card:only-child .card-footer,
                .card-group>.card:only-child .card-img-bottom {
                    border-bottom-right-radius: .2rem;
                    border-bottom-left-radius: .2rem
                }
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child),
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer,
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top {
                    border-radius: 0
                }
            }
            
            .card-columns .card {
                margin-bottom: .75rem
            }
            
            @media (min-width:576px) {
                .card-columns {
                    -webkit-column-count: 3;
                    column-count: 3;
                    -webkit-column-gap: 1.25rem;
                    column-gap: 1.25rem;
                    orphans: 1;
                    widows: 1
                }
                .card-columns .card {
                    display: inline-block;
                    width: 100%
                }
            }
            img.img-circle {
                width: 150px;
                height: 150px;
                /* position: absolute; */
                left: 60px;
                z-index: 1;
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
                  <i style="font-size: 16pt" class="icon fa fa-shopping-bag"></i>
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
            <li><a href="#about">Paket</a></li>
            <!-- <li><a href="after-login.html">Iklan</a></li> -->
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
    
    <main id="main">
            <section class="container">
                <div class="row">
                   <div class="col-md-12">
                        <div class="cover-photo" style="background-image: url('img/bg-1.jpg') ;">
                            <br /><br /><br /><br /><br /><br /><br /><br />
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
</body>
</html>