<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">

<title>Paket Nikah Minimalis - Zenith </title>

<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

<!-- jQuery -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>

 <!-- Favicons -->
 <link href="{{asset('img/favicon.png')}}" rel="icon">
 <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
 <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('css/fix.css')}}" rel="stylesheet" type="text/css"/>

 <!-- Libraries CSS Files -->
 <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
 <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
 <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
 <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
 <link href="{{asset('css/style.css')}}" rel="stylesheet">
<style>
	/* CSS used here will be applied after bootstrap.css */

.nav-pills > li.active > a, .nav-link > li.active > a:focus, .nav-link > li.active > a:hover {
 border-top: none;
 border-left: none;
 border-right: none;
 border-bottom: 3px solid #e9a39c;
 font-weight: bold;
}
.nav-pills .nav-link .pilus{
	border: none;
	background: none;
	border: 20px;
}

.nav-link > li > a:hover {
  border: 1px solid transparent;
}

.nav > li > a:focus, .nav > li > a:hover {
	background-color: transparent;
}

</style>

</head>
<body>
        <button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>
        <header id="header" class="header-stack">
          <div class="container">
            <div class="logo float-left">
              <h1 class="text-light"><a href="{{ url('/') }}" class="scrollto"><span>ZEN</span></a></h1>
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
													<form action="{{url('/search')}}" method="post" id="searchPaket">
														{{ csrf_field() }}
														<span class="fa fa-glip fa-search form-control-feedback"></span>
														<input type="text" class="form-controls form-control" name="paket" placeholder="Cari...">
												</form>
                        </div>
                    </div>
                </li>
								@if ($user == null)
								<li><a href="" class="trigger-btn" data-toggle="modal" data-target=".modalLogin">LOGIN</a></li> 
								<li><a href="" class="trigger-btn" data-toggle="modal" data-target="#modalRegist">REGISTER</a></li>
								@elseif ($user->is_eo == 1 )
								<li><a href="#about">Paket</a></li>
								<li class="drop-down"><a href="#"><span>{{$user->name}}</span></a>
										<ul>
											<li><a href="{{url('/paket')}}">Paket</a></li>
											<li><a href="#">Pengriman</a></li>
											<li><a href="#">Dashboard</a></li>
											<li><a href="{{ url('/logout') }}">Sign Out</a></li>
										</ul>
								</li>
								@endif
              </ul>
            </nav>
          </div>
        </header>

<br /><br /><br />
<section class="section-bg-2 section-content padding-y-sm">
<div class="container">
<br>
<h1>Detail Paket</h1>
<br>
@foreach($paket as $value)
<main class="card">
	<div class="row no-gutters">
		<div class="col-sm-6">
			<article class="gallery-wrap"> 
				<div class="img-big-wrap">
					@php $images_paket = json_decode($value->gambar_paket) @endphp
					<div> <a href="" data-fancybox=""><img class="img-responsive img-wrap" src="{{ asset('img/upload/'.$images_paket[0]) }}"></a></div>
				</div>
				<div class="img-small-wrap">
					<div class="item-gallery"> <img src="{{ asset('img/items/bgd.jpg') }}"></div>
					<div class="item-gallery"> <img src="{{ asset('img/items/bgd.jpg') }}"></div>
					<div class="item-gallery"> <img src="{{ asset('img/items/bgd.jpg') }}"></div>
				</div> 
			</article>
		</div>
		<div class="col-sm-6">
			<article class="card-body">
				<!-- short-info-wrap -->
					<h3 class="title mb-3">{{$value->nama_paket}}</h3>
				<div class="mb-3"> 
					<var class="price h3 text-warning"> 
						<span class="currency">Rp. {{ number_format($value->harga_paket) }},-</span>
					</var> 
				</div>
				<div class="rating-wrap">
						<ul class="rating-stars">
							<li style="width:80%" class="stars-active"> 
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
						<div class="label-rating"> <b>132 Ulasan</b> | 136 Penjualan</div>
				</div>
				<br />
				<div class="row">
						<dt class="col-sm-3">Kategori</dt>
						<dd class="col-sm-9">{{ $value->kategori }}</dd>
					
						<dt class="col-sm-3">Status</dt>
						<dd class="col-sm-9">{{ $value->available }}</dd>
				</div>
				<br><br><br>
					{{-- <div class="row">
						<div class="col-sm-5">
							<dl class="dlist-inline">
								<dt>Quantity: </dt>
								<dd> 
									<select class="form-control form-control-sm" style="width:70px;">
										<option> 1 </option>
										<option> 2 </option>
										<option> 3 </option>
									</select>
								</dd>
							</dl>  <!-- item-property .// -->
						</div> <!-- col.// -->
						<div class="col-sm-7">
							<dl class="dlist-inline">
									<dt>Size: </dt>
									<dd>
										<label class="form-check form-check-inline">
										<input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
										<span class="form-check-label">SM</span>
									</label>
									<label class="form-check form-check-inline">
										<input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
										<span class="form-check-label">MD</span>
									</label>
									<label class="form-check form-check-inline">
										<input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
										<span class="form-check-label">XXL</span>
									</label>
									</dd>
							</dl>  <!-- item-property .// -->
						</div> <!-- col.// -->
					</div> --}}
					<a href="#" class="btn  btn-outline-danger"><i class="fa fa-heart-o"></i>  Favorit</a>
					<a href="#" class="btn  btn-danger">Ambil Penawaran</a>
			</article> 
		</div> 
	</div>
</main>

<article class="card mt-3">
	<div class="card-body">
			<div class="content-section-c">

					<div class="container">
							<ul class="nav nav-pills pilus mb-3" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Toko</a>
									</li>
									<li class="nav-item">
										<a class="nav-link " id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Deskripsi</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ulasan</a>
									</li>
								</ul>
								<div class="tab-content" id="pills-tabContent">
									<div class="tab-pane fade show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
										<p>{{ $value->deskripsi }}</p>
									</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
									</div>
									<div class="tab-pane active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<div class="media mt-3">
											<a class="pr-2" href="#">
													<img src="{{ asset('img/EO/eo-2.jpg') }}" width="65" height="65" class="rounded-circle mr-5" alt="Marie Salter">
											</a>
											<div class="media-body">
													<h4>{{ $nama_eo[0]->name }}</h4>
													<a href="#" class="btn btn-danger"><i class="	far fa-comment"></i> Kontak</a>
											</div>
									</div>
									</div>
								</div>
					</div>
			</div>
	</div>
</article>
</section>
@endforeach

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
<script>
	$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
$('#myTab a[href="#profile"]').tab('show') // Select tab by name
$('#myTab li:first-child a').tab('show') // Select first tab
$('#myTab li:last-child a').tab('show') // Select last tab
$('#myTab li:nth-child(3) a').tab('show') // Select third tab
</script>
</body>
</html>