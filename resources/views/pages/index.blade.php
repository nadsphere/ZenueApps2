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
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fix.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('css/measure.css')}}" rel="stylesheet" type="text/css"/>

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style2.css')}}" rel="stylesheet">
</head>
<body>
  <header id="header">
    <div class="container">
      <div class="logo float-left">
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>ZEN</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#about">Mitra EO</a></li>
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
                    <form action="{{url('/search')}}" method="post" id="searchPaket">
                    {{ csrf_field() }}
                        <span class="fa fa-glip fa-search form-control-feedback"></span>
                        <input type="text" class="form-controls form-control" name="paket" placeholder="Cari...">
                    </form>
                    </div>
                </div>
            </li>
            @if ($user == null)
          <li><a href="" class="trigger-btn" data-toggle="modal" data-target="#modalLogin">LOGIN</a></li> 
          <li><a href="" class="trigger-btn" data-toggle="modal" data-target="#modalRegist">REGISTER</a></li>
            @elseif ($user->is_eo == 1 )
            <li><a href="#about">Paket</a></li>
            <li class="drop-down"><a href="#"><span>{{$user->name}}</span></a>
                <ul>
                  <li><a href="{{ url('/paket') }}">Paket</a></li>
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

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
              <div class="modal-header">				
                <h4 class="modal-title">Sign In</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{ url('/login') }}" method="post">
                {{ csrf_field() }}
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user" style="margin-top:10px"></i></span>
                      <input type="text" class="form-control" name="no_telp" placeholder="Masukkan Email" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock" style="margin-top:10px"></i></span>
                      <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Sign In</button>
                  </div>
                  <p class="hint-text"><a href="#">Lupa Password?</a></p>
                </form>
              </div>
              <div class="modal-footer">Belum Punya Akun? <a href="#">Daftar di sini</a></div>
            </div>
          </div>
    </div>
    <div class="modal fade" id="modalRegist" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
              <div class="modal-header">				
                <h4 class="modal-title">Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{url('/register')}}" method="post">
                {{ csrf_field() }}
                  <div class="form-group">
                    <div class="input-group">
                        <label for="role_as" class="opsi_name">Mendaftar Sebagai </label>
                        <br />
                        <div style="margin-left:20px">
                          <select class="form-control" id="role_as" name="role">
                            <option value="renter"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#sub-model" data-dismiss="modal">Pelanggan</button></option>
                            <option value="eo"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#eoModal" data-dismiss="modal">Pemilik Acara (EO)</button></option>
                        </select>
                        </div>
                    </div>
                    @if ($errors->first('role'))
                    <strong id="error" style="margin-left:10px;color:gray;font-size:10px;">{{ $errors->first('role') }}</strong>
                  @endif
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" style="margin-top:10px"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" required="required" value="{{ old('name') }}">
                      </div>
                  @if ($errors->first('name'))
                    <strong id="error" style="margin-left:10px;color:gray;font-size:10px;">{{ $errors->first('name') }}</strong>
                  @endif
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope" style="margin-top:10px"></i></span>
                      <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="required" value="{{ old('email') }}">
                    </div>
                    @if ($errors->first('email'))
                      <strong id="error" style="margin-left:10px;color:gray;font-size:10px;">{{ $errors->first('email') }}</strong>
                    @endif
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone" style="margin-top:10px"></i></span>
                        <input type="text" class="form-control" name="no_telp" placeholder="No. Telp" required="required" value="{{ old('no_telp') }}">
                      </div>
                      @if ($errors->first('no_telp'))
                        <strong id="error" style="margin-left:10px;color:gray;font-size:10px;">{{ $errors->first('no_telp') }}</strong>
                      @endif
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock" style="margin-top:10px"></i></span>
                      <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="required" value="{{ old('password') }}">
                    </div>
                    @if ($errors->first('password'))
                      <strong id="error" style="margin-left:10px;color:gray;font-size:10px;">{{ $errors->first('password') }}</strong>
                    @endif
                  </div>
                  <p class="hint-text">Dengan Mendaftar, anda telah menyetujui <a href="#">Syarat & Kebijakan</a> Kami</p>
                  <br>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Sign up</button>
                  </div>
                  <div class="modal-footer border-top-0">
                      <p class="hint-text">Sudah Punya akun? <a href="#"> Sign In</p>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    <div id="eoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-login">
        <div class="modal-content">
          <div class="modal-header">				
            <h4 class="modal-title">Register EO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{url('/registereo')}}" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building fa_color" style="margin-top:10px"></i></span>
                    <input type="text" class="form-control" name="namaeo" placeholder="Nama EO" required>
                  </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa_color" style="margin-top:10px"></i></span>
                  <input type="email" class="form-control" name="emaileo" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map fa_color" style="margin-top:10px"></i></span>
                  <input type="text" class="form-control" name="alamateo" placeholder="Alamat" required>
                </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone fa_color" style="margin-top:10px"></i></span>
                    <input type="text" class="form-control" name="kontakeo" placeholder="Kontak" required="required">
                  </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-globe fa_color" style="margin-top:10px"></i></span>
                  <input type="text" class="form-control" name="linkeo" placeholder="Link (opsional)">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa_color" style="margin-top:10px"></i></span>
                  <input type="text" class="form-control" name="passwordeo" placeholder="Masukkan Password" required="required">
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar_profil_eo" accept="image/*" id="gambarprofil">
                  <label class="custom-file-label" for="gambarprofil">Foto Profil</label>
                </div>
              </div>            
              <p class="hint-text"> <a href="#"></a> Dengan Mendaftar, anda telah menyetujui <a href="">Syarat & Ketentuan</a> Kami</p>  
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Sign up</button>
              </div>
              <div class="modal-footer border-top-0">
                  <p class="hint-text">Sudah Punya akun? <a href="#"> Sign In</p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 


  <section>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="first-slide img-box" style="background: rgb(193, 23, 23, .5); height: 50%;" src="img/bg-1.jpg" alt="First slide">
              <div class="carousel-caption text-left d-none d-md-block ">
                <h3 class="display-4" style="color:white;">Get 30% Off</h3>
                <p class="lead" style="color:white;">Untuk setiap pemesanan pertama</p>
                <a class="btn btn-lg btn-outline-light" href="#" role="button">Pesan Sekarang</a>
              </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide img-fluid" src="img/bg-2.jpg" alt="Second slide">
              <div class="carousel-caption text-left d-none d-md-block">
                <h3 class="display-4">Best Day Offer</h3>
                <p class="lead">Diskon besar-besaran untuk event terbaikmu</p>
              </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide img-fluid overlay" src="img/bg-3.jpg" alt="Third slide">
              <div class="carousel-caption text-left d-none d-md-block">
                <h3 class="display-4">Pasang Iklanmu di sini!</h3>
                <p class="lead">Nikmati keuntungan lebih dengan mempromosikan mitra Anda</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
             </a>
      </div>
  </section>
  <main id="main">
		<section id="services" class="section-bg">
		    <div class="container">
          <div class="row">
              <div class="col-md-2 col-sm-4 data-wow-duration="1.4s">
                  <a href="">
                  <div class="box">
                      <div class="icon-md" style="background: rgb(193, 23, 23, .5); border-radius:50%">
                      <img src="img/icon/ico-04.svg" style="color:white" alt="">
                      </div>
                      <h4 style="margin-top:10px" class="title">Concert</h4>
                  </div>
                  </a>
              </div>
              <div class="col-md-2 col-sm-4" data-wow-duration="1.4s">
                  <a href="">
                  <div class="box">
                      <div class="icon-md" style="background: rgb(193, 23, 23, .5); border-radius:50%">
                      <img src="img/icon/ico-03.svg" style="color:white" alt="">
                      </div>
                      <h4 style="margin-top:10px" class="title">Party</h4>
                  </div>
                  </a>
              </div>
              <div class="col-md-2 col-sm-4" data-wow-duration="1.4s">
                  <a href="">
                      <div class="box">
                          <div class="icon-md" style="background: rgb(193, 23, 23, .5); border-radius:50%">
                          <img src="img/icon/ico-01.svg" style="color:white" alt="">
                          </div>
                          <h4 style="margin-top:10px" class="title">Wedding</h4>
                      </div>
                  </a>
              </div>
              <div class="col-md-2 col-sm-4" data-wow-duration="1.4s">
                  <a href="">
                      <div class="box">
                          <div class="icon-md" style="background: rgb(193, 23, 23, .5); border-radius:50%">
                          <img src="img/icon/ico-02.svg" style="color:white" alt="">
                          </div>
                          <h4 style="margin-top:10px" class="title">Conference</h4>
                      </div>
                  </a>
              </div>
              <div class="col-md-2 col-sm-4" data-wow-duration="1.4s">
                  <a href="">
                      <div class="box">
                          <div class="icon-md" style="background: rgb(193, 23, 23, .5); border-radius:50%">
                          <img src="img/icon/ico-06.svg" style="color:white" alt="">
                          </div>
                          <h4 style="margin-top:10px" class="title">Rental</h4>
                      </div>
                  </a>
              </div>
              <div class="col-md-2 col-sm-4" data-wow-duration="1.4s">
                  <a href="">
                      <div class="box">
                          <div class="icon-md" style="background: rgb(193, 23, 23, .5); border-radius:50%">
                          <img src="img/icon/ico-05.svg" style="color:white" alt="">
                          </div>
                          <h4 style="margin-top:10px" class="title">Catering</h4>
                      </div>
                  </a>
              </div>        
          </div>
			  </div>
		</section>
		<section class="bg-gray"> 
			<div class="container">
				<div class="row">  
          <div class="col-md-12">
              <div id="myCarousel" class="carousel carousels slide" data-ride="carousels" data-interval="0"> 
                  <header class="section-header">
                      <h3>Best EO</h3>
                      <br>
                    </header>
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>   
                    <div class="carousel-inner">
                        <div class="item carousel-item active">
                                <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/eo-1.png" class="img-responsive img-fluid img-rd" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Parama Creative</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker"></i> <b> Jakarta Pusat</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                        <div class="img-box">
                                        <img src="img/EO/eo-3.jpg" class="img-responsive img-fluid img-rd" alt="">									
                                        </div>
                                        <div class="thumb-content">
                                        <h4>Moment n Co.</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                        </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/eo-4.jpg" class="img-responsive img-fluid" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>FUN Party</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/mama.jpg" class="img-responsive img-fluid img-rd" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>MAM EO</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                </div>
                                <br><br>
                        </div>
                        <div class="item carousel-item">
                                <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/eo-1.png" class="img-responsive img-fluid img-rd" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Parama Creative</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker"></i> <b> Jakarta Pusat</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                        <div class="img-box">
                                        <img src="img/EO/eo-3.jpg" class="img-responsive img-fluid img-rd" alt="">									
                                        </div>
                                        <div class="thumb-content">
                                        <h4>Moment n Co.</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                        </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/eo-4.jpg" class="img-responsive img-fluid" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>FUN Party</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/mama.jpg" class="img-responsive img-fluid img-rd" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>MAM EO</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                </div>
                                <br><br>
                        </div>
                        <div class="item carousel-item">
                                <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/eo-1.png" class="img-responsive img-fluid img-rd" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Parama Creative</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker"></i> <b> Jakarta Pusat</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                        <div class="img-box">
                                        <img src="img/EO/eo-3.jpg" class="img-responsive img-fluid img-rd" alt="">									
                                        </div>
                                        <div class="thumb-content">
                                        <h4>Moment n Co.</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                        </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/eo-4.jpg" class="img-responsive img-fluid" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>FUN Party</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrappers">
                                    <div class="img-box">
                                        <img src="img/EO/mama.jpg" class="img-responsive img-fluid img-rd" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>MAM EO</h4>									
                                        <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        </div>
                                        <p class="item-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <b> Jakarta Timur</b></p>
                                        <a href="#" class="btn btn-primary">Ajukan Penawaran</a>
                                    </div>						
                                    </div>
                                </div>
                                </div>
                                <br><br>
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
              </div>
          </div> 
				</div>
			</div>                          		                            
    </section>
    <section class="section-bg"> 
        <div class="container">
            <br>
            <header class="section-header">
                <h3 class="title">Best Services</h3>
                <a href="" class="float-right">See All <i class="icon fa fa-chevron-right"></i></a>
                <br>
            </header>
            <br>
            <div class="row-sm">
                <div class="col-md-3 col-sm-6">
                  <a href="start.html">
                    <figure class="card card-product">
                        <div class="img-wrap"> <img class="" src="img/items/wedding-package.jpeg"></div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><b> Paket Nikah (Tipe: Anggrek)</b></a>
                            <div class="action-wrap">
                              <div class="price-wrap">
                                <span class="price-new">Rp 36.000.000</span>
                              </div> 
                            </div>
                        </figcaption>
                    </figure>
                  </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="start.html">
                      <figure class="card card-product">
                          <div class="img-wrap"> <img class="" src="img/items/cat-2.png"></div>
                          <figcaption class="info-wrap">
                              <a href="#" class="title"><b>A la Western Catering Package</b></a>
                              <div class="action-wrap">
                                <div class="price-wrap">
                                  <span class="price-new">Rp 12.000.000</span>
                                </div> 
                              </div>
                          </figcaption>
                      </figure>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="start.html">
                      <figure class="card card-product">
                          <div class="img-wrap"> <img class="" src="img/items/wed-3.jpg"></div>
                          <figcaption class="info-wrap">
                              <a href="#" class="title"><b>Sultan Class Wedding Package (Custom Nego)</b></a>
                              <div class="action-wrap">
                                <div class="price-wrap">
                                  <span class="price-new">Rp 60.000.000</span>
                                </div> 
                              </div>
                          </figcaption>
                      </figure>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <figure class="card card-product">
                        <div class="img-wrap"> <img src="img/items/cont.png"></div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><b> Paket Konser Tipe Ekonomis</b></a>
                            <div class="action-wrap">
                              <div class="price-wrap">
                                <span class="price-new">Rp 25.000.000</span>
                              </div> 
                            </div>
                        </figcaption>
                    </figure> <!-- card // -->
                </div>
            </div>
            <br>
            <div class="row-sm">
                <div class="col-md-3 col-sm-6">
                  <a href="start.html">
                    <figure class="card card-product">
                        <div class="img-wrap"> <img class="" src="img/items/wedding-package.jpeg"></div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><b> Paket Nikah (Tipe: Anggrek)</b></a>
                            <div class="action-wrap">
                              <div class="price-wrap">
                                <span class="price-new">Rp 36.000.000</span>
                              </div> 
                            </div>
                        </figcaption>
                    </figure>
                  </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="start.html">
                      <figure class="card card-product">
                          <div class="img-wrap"> <img class="" src="img/items/wed-2.jpg"></div>
                          <figcaption class="info-wrap">
                              <a href="#" class="title"><b>Paket Nikah Silver Class</b></a>
                              <div class="action-wrap">
                                <div class="price-wrap">
                                  <span class="price-new">Rp 22.000.000</span>
                                </div> 
                              </div>
                          </figcaption>
                      </figure>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="start.html">
                      <figure class="card card-product">
                          <div class="img-wrap"> <img class="" src="img/items/wed-3.jpg"></div>
                          <figcaption class="info-wrap">
                              <a href="#" class="title"><b>Sultan Class Wedding Package (Custom Nego)</b></a>
                              <div class="action-wrap">
                                <div class="price-wrap">
                                  <span class="price-new">Rp 60.000.000</span>
                                </div> 
                              </div>
                          </figcaption>
                      </figure>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <figure class="card card-product">
                        <div class="img-wrap"> <img src="img/items/cont.png"></div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><b> Paket Konser Tipe Ekonomis</b></a>
                            <div class="action-wrap">
                              <div class="price-wrap">
                                <span class="price-new">Rp 25.000.000</span>
                              </div> 
                            </div>
                        </figcaption>
                    </figure> <!-- card // -->
                </div>
            </div>
            <div class="row-sm">
                <div class="col-md-3 col-sm-6">
                  <a href="start.html">
                    <figure class="card card-product">
                        <div class="img-wrap"> <img class="" src="img/items/wedding-package.jpeg"></div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><b> Paket Nikah (Tipe: Anggrek)</b></a>
                            <div class="action-wrap">
                              <div class="price-wrap">
                                <span class="price-new">Rp 36.000.000</span>
                              </div> 
                            </div>
                        </figcaption>
                    </figure>
                  </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="start.html">
                      <figure class="card card-product">
                          <div class="img-wrap"> <img class="" src="img/items/wed-2.jpg"></div>
                          <figcaption class="info-wrap">
                              <a href="#" class="title"><b>Paket Nikah Silver Class</b></a>
                              <div class="action-wrap">
                                <div class="price-wrap">
                                  <span class="price-new">Rp 22.000.000</span>
                                </div> 
                              </div>
                          </figcaption>
                      </figure>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="start.html">
                      <figure class="card card-product">
                          <div class="img-wrap"> <img class="" src="img/items/wed-3.jpg"></div>
                          <figcaption class="info-wrap">
                              <a href="#" class="title"><b>Sultan Class Wedding Package (Custom Nego)</b></a>
                              <div class="action-wrap">
                                <div class="price-wrap">
                                  <span class="price-new">Rp 60.000.000</span>
                                </div> 
                              </div>
                          </figcaption>
                      </figure>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <figure class="card card-product">
                        <div class="img-wrap"> <img src="img/items/cont.png"></div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><b> Paket Konser Tipe Ekonomis</b></a>
                            <div class="action-wrap">
                              <div class="price-wrap">
                                <span class="price-new">Rp 25.000.000</span>
                              </div> 
                            </div>
                        </figcaption>
                    </figure> <!-- card // -->
                </div>
            </div>
            <br /> <br>
        </div>                    		                            
    </section> 
    <section class="bg-white" id="why-us">
        <div class="container">
          <header class="section-header">
            <h3>Kenapa Zenith?</h3>
            <br>
          </header>
          <div class="row">
            <div></div>
            <div class="col-lg-4 col-md-5">
                <div class="why-us-content">
                  <div class="features">
                    <i class="fa fa-users" style="color: #c11717;"></i>
                    <h4 class="title">EO Berpengalaman</h4>
                    <p>Berasal dari EO profesional dan berpengalaman yang siap melayani Anda</p>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="why-us-content">
                  <div class="features">
                    <i class="fa fa-dropbox" style="color: #c11717;"></i>
                    <h4 class="title">Mudah & Cepat</h4>
                    <p>Beragam layanan berkualitas dan pengiriman responsif </p>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="why-us-content">
                  <div class="features">
                    <i class="fa fa-lock" style="color: #c11717;"></i>
                    <h4 class="title">Aman </h4>
                    <p>Pembayaran dan Negosiasi dijamin aman dari EO terpercaya</p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </section>
    <section id="call-to-action" class="">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="cta-title">Buka EO mu Sekarang</h3>
              <p class="cta-text"> Yuk gabung bersama kami untuk mewujudkan peluang bisnis yang tinggi.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a href="" class="cta-btn align-middle" data-toggle="modal" data-target=".modalBukaEO">Buka EO</a>
            </div>
          </div>
        </div>
    </section>
  </main>

  <div class="modal fade modalBukaEO" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-login">
          <div class="modal-content">
            <div class="modal-header">				
              <h4 class="modal-title">Register</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <form action="/examples/actions/confirmation.php" method="post">
                <div class="form-group">
                  <div class="input-group">
                      <label for="daftaran" class="opsi_name">Mendaftar Sebagai </label>
                      <br />
                      <div style="margin-left:20px">
                          <div class="form-check-inline rad_check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Pemilik Acara (EO)
                              </label>
                          </div>
                          <div class="form-check-inline rad_check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio">Pelanggan
                            </label>
                          </div>
                      </div>
                        
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user" style="margin-top:10px"></i></span>
                      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="required">
                    </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope" style="margin-top:10px"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="required">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone" style="margin-top:10px"></i></span>
                      <input type="text" class="form-control" name="no_telp" placeholder="No. Telp" required="required">
                    </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock" style="margin-top:10px"></i></span>
                    <input type="text" class="form-control" name="password" placeholder="Masukkan Password" required="required">
                  </div>
                </div>
                <p class="hint-text">Dengan Mendaftar, anda telah menyetujui <a href="#">Syarat & Kebijakan</a> Kami</p>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-lg">Sign up</button>
                </div>
              </form>
            </div>
            <div class="modal-footer border-top-0">Sudah Punya akun? <a href="#"> Sign In</a></div>
          </div>
      </div>
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
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
    $('.carousel').carousel({
  interval: 2000
  })
  </script>
  @if( $errors->any())
<script>
    $('#modalRegist').modal('show');
</script>
@endif

<script>
$('body').keypress(function(e){
if (e.keyCode == 13)
{
    $('#searchPaket').submit();
}
});
</script>

<script>
  $('#role_as').change(function(){
    var title = $(this).val();
      $('#eoModal').modal('show');
      $('#modalRegist').modal('hide');
  });
</script>

</body>
</html>