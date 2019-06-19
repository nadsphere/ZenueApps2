@extends('layout.app')
@section('content')
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
              <div class="modal-header">				
                <h4 class="modal-title">Sign In</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                @php $error_login = Session::get('error'); @endphp
                <form action="{{ url('/login') }}" method="post">
                {{ csrf_field() }}
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user" style="margin-top:10px"></i></span>
                      <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telp" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock" style="margin-top:10px"></i></span>
                      <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="required">
                    </div>
                  </div>
                  @if (!empty($error))
                  <div class="form-group">
                    <strong id="error" style="margin-left:10px;color:gray;font-size:10px;">{{ $error }}</strong>
                  </div>
                  @endif
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
    <div id="modalRegistEO" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-login  modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">				
            <h4 class="modal-title">Buka Event Organizer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{'/registereo'}}" method="post">
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
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar_profil_eo" accept="image/*" id="gambarprofil" required>
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
    <section id="intro" class="clearfix">
        <div class="container d-flex h-100">
          <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-first mb-5">
              <h2>Make your Event Awesome!</h2>
              <p>Temukan layanan organizer untuk berbagai acara di lokasi terdekat Anda dan dapatkan rekomendasi menarik lainnya</p>
              <div>
                <a href="#about" class="btn-get-started scrollto">Daftar Sekarang</a>
              </div>
            </div>
      <br>
            <div class="col-md-6 intro-img order-md-last order-last pt-1">
              <img src="{{asset('img/bn-img.png')}}" alt="" class="img-fluid clo-img">
            </div>
          </div>
    
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
            @foreach ($rekomendasi_paket as $rekomendasi)
                <div class="col-md-3 col-sm-6">
                  <a href="{{ url('/detail_paket/'.$rekomendasi->id) }}">
                    <figure class="card card-product">
                        @php $images_paket = json_decode($rekomendasi->gambar_paket) @endphp
                        <div class="img-wrap"> <img class="" src="{{ asset('img/upload/'.$images_paket[0]) }}"></div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><b>{{$rekomendasi->nama_paket}}</b></a>
                            <div class="action-wrap">
                              <div class="price-wrap">
                                <span class="price-new">Rp. {{ number_format($rekomendasi->harga_paket) }}</span>
                              </div> 
                            </div>
                        </figcaption>
                    </figure>
                  </a>
                </div>
              @endforeach
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

@if ($errors->any())
  <script>
      $('#modalRegist').modal('show');
  </script>
  @endif

@if(!empty($error_login))
<script>
$(function() {
    $('#modalLogin').modal('show');
});
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
@endsection