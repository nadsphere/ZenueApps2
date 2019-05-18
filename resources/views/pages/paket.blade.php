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
									<form action="{{url('/search')}}" method="post" id="searchPaket">
										{{ csrf_field() }}
										<span class="fa fa-glip fa-search form-control-feedback"></span>
										<input type="text" class="form-controls form-control" name="paket" placeholder="Cari...">
								</form>
              </div>
            </div>
          </li>
            <!-- <li><a href="after-login.html">Iklan</a></li> -->
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
  <main id="main">
    <section class="bg-white"> 
        <div class="container" style="margin-top:75px">
            <br /><br />
            <header class="section-header">
                <h3 class="title">Paket Anda</h3>
            </header>
            <br>
            <div class="row-sm">
              <div></div>
              <div class="col-lg-4 col-md-5">
                <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah Paket
                </a>
                    
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="text-center" id="myLargeModalLabel">Form Tambah Paket</h4>
                        </div>
                        <div class="modal-body">
                            <form class="" action="{{url('/insert/')}}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                  <label for="foto_p">Foto Produk</label>
                                  <div class="input-group control-group increment" >
                                    <input type="file" name="gambar_paket[]" class="form-control">
                                    <div class="input-group-btn"> 
                                      <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                  </div>
                                  <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                      <input type="file" name="gambar_paket[]" class="form-control">
                                      <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                              @endif
                              @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div> 
                              @endif

                              <div class="mb3">
                                <label for="nama_p">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_p" placeholder=""  required="required" name="nama_paket">
                              </div>
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label for="kategori">Kategori</label>
                                  <select class="form-control" id="kategori" name="kategori">
                                    <option value="Catering">Catering</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Concert">Concert</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Party">Party</option>
                                    <option value="Rental">Rental</option>
                                  </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="status_pk">Status Paket</label>
                                  <select class="form-control" id="status_pk" name="available">
                                    <option>Tersedia</option>
                                    <option>Tidak Tersedia</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="address">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
                              </div>
                              <div class="mb-3">
                                <label for="harga_pkt">Harga Paket </label>
                                <input type="text" class="form-control" id="harga_pkt" placeholder="100000" name="harga_paket">
                              </div>
                              <button class="btn btn-danger btn-md btn-block" type="submit">Simpan</button>
                            </form>    
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-5"></div>
              <div class="col-lg-4 col-md-5">
                  <form class="form-inline float-right">
                      <div class="form-group mb-2">
                        <label for="urut" class="">Urutkan <span> <i class="fa fa-sort"></i></span></label>
                      </div>
                      <div class="form-group mx-sm-1 mb-2">
                          <select class="form-control" id="urut">
                            <option>Nama</option>
                            <option>Kategori</option>
                            <option>Status</option>
                            <option>Harga</option>
                          </select>
                      </div>
                  </form>                              
              </div>    
            </div>
            <br>
            <div class="row-sm">
              <div></div>
              <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="prd-img">No.</th>
                            <th class="prd-img">Gambar Paket</th>
                            <th class="prd-name">Nama Paket</th>
                            <th class="prd-cate">Kategori</th>
                            <th class="prd-sta">Status Paket</th>
                            <th class="prd-dsc">Deskripsi</th>
                            <th class="prd-prc">Harga</th>
                            <th class="prd-name">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $value)
                          <tr>
                            <td>{{ ++$i }}</td>
                            @php $images_paket = json_decode($value->gambar_paket) @endphp
                            <td><img height="90px" width="100px" class="d-flex justify-content-center" src="{{asset('img/upload/'.$images_paket[0])}}" alt="{{$value->gambar_paket}}"></td>
                            <td>{{$value->nama_paket}}</td>
                            <td>{{$value->kategori}}</td>
                            <td>{{$value->available}}</td>
                            <td>{{$value->deskripsi}}</td>
                            <td>Rp. {{ number_format($value->harga_paket)}} ,-</td>
                          <td><a href="{{url('edit_data/'.$value->id)}}" data-toggle="modal" data-target="#editpaket{{$value->id}}" class="btn btn-warning fa fa-pencil"></a>
                            <a href="{{url('hapus_paket/'.$value->id)}}" class="btn btn-danger fa fa-trash"></a>
                            <a href="{{url('/detail_paket/'.$value->id)}}" class="btn btn-info fa fa-info-circle"></a></td>
                          </tr> 
                          @foreach ($paket as $item)
                            <div class="modal fade" tabindex="-1" role="dialog" id="editpaket{{$item->id}}" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="text-center" id="myLargeModalLabel">Edit Paket</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="" action="{{url('/update/'.$item->id)}}" enctype="multipart/form-data" method="POST">
                                            {{ csrf_field() }}
                                          <div class="mb-3">
                                            <label for="foto_p">Foto Produk</label>
                                            @php
                                              $images_paket = json_decode($value->gambar_paket);
                                            @endphp
                                            <input type="file" class="form-control-file" id="lain" name="gambar_paket[]" value="">
                                          </div>
                                          <div class="mb3">
                                            <label for="nama_p">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_p" placeholder="" value="{{$item->nama_paket}}" required="required" name="nama_paket">
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6 mb-3">
                                              <label for="kategori">Kategori</label>
                                              <select class="form-control" id="kategori" name="kategori" value="{{$item->kategori}}">
                                                <option value="{{$value->id}}">Catering</option>
                                                <option value="Wedding">Wedding</option>
                                                <option value="Concert">Concert</option>
                                                <option value="Conference">Conference</option>
                                                <option value="Party">Party</option>
                                                <option value="Rental">Rental</option>
                                              </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                              <label for="status_pk">Status Paket</label>
                                              <select class="form-control" id="status_pk" name="available">
                                                <option>Tersedia</option>
                                                <option>Tidak Tersedia</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="mb-3">
                                            <label for="address">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi">{{$item->deskripsi}}</textarea>
                                          </div>
                                          <div class="mb-3">
                                            <label for="harga_pkt">Harga Paket </label>
                                            <input type="text" class="form-control" id="harga_pkt" placeholder="100000" name="harga_paket" value="{{$item->harga_paket}}">
                                          </div>
                                          <button class="btn btn-danger btn-md btn-block" type="submit">Simpan Perubahan</button>
                                        </form>    
                                    </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        @endforeach
                        
                    </tbody>
                </table>
              </div>
            </div>
        </div>                    		                            
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
  <script type="text/javascript">

$(document).ready(function() {

  $(".btn-success").click(function(){ 
      var html = $(".clone").html();
      $(".increment").after(html);
  });

  $("body").on("click",".btn-danger",function(){ 
      $(this).parents(".control-group").remove();
  });

});

</script>

</body>
</html>