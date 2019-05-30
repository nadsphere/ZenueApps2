<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transaksi Saya</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style2.css')}}" rel="stylesheet">
    <link href="{{asset('css/ui.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fix.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <style>
        .ava-prof{
            width: 50%;
            height: 50%;
            position: relative;
            overflow: hidden;
        }
        .home-pho img{
            position: absolute;
            top: 0;
            left: 0;
            vertical-align: middle;
            border-radius: 50%;
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
                          <p>Anda Membatalkan Pembayaran Customer...</p>
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
                    <a class="dropdown-item" href="eo_notif">
                        <div class="notification__icon-wrapper">
                          <div class="notification__icon">
                            <i class="fa fa-check-circle"></i>
                          </div>
                        </div>
                        <div class="notification__content">
                          <span class="notification__category">Penerimaan Pesanan</span>
                          <p>Anda menerima pesanan dari Pelanggan Jono Triyono..</p>
                        </div>
                      </a>
                </li>
                <hr>
                <li>
                  <a href="" class="dropdown-item notification__all text-muted text-center">Lihat Semua</a>
                    <!-- <a class="dropdown-item notification__all text-center" href="#"> Lihat Semua </a> -->
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
    <main id="main" class="section-bg2">
    <section> 
            <br /><br /><br /><br /><br /><br />
        <div class="container bg-white" style="padding:40px">
            <header class="section-header">
                <h3 class="title">Orders</h3>
            </header>
            <div class="row-sm">
              <div></div>
              <div class="col-lg-4 col-md-5"></div>
              <div class="col-lg-8 col-md-5">
                  <form class="form-inline float-right">
                      <div class="form-group mb-2">
                        <label for="urut" class="">Urut Berdasarkan <span><i style="margin-left:2px" class="fa fa-sort"></i></span></label>
                      </div>
                      <div class="form-group mx-sm-1 mb-2" style="margin-left:15px">
                          <select class="form-control" id="urut">
                            <option>Kode Booking</option>
                            <option>Kode Bayar</option>
                            <option>Jenis Bayar</option>
                            <option>Nama User</option>
                          </select>
                      </div>
                  </form>         
                </p>                      
              </div>    
            </div>
            <br>
            <div class="row-sm">
            <div></div>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="prd-name">ID Booking</th>
                            <th class="prd-cate">User</th>
                            <th class="prd-opt">Payment Status</th>
                            <th class="prd-dsc">Total (Rp)</th>
                            <th class="prd-name">Jenis Bayar</th>
                            <th class="prd-prc">Tanggal</th>
                            <th class="prd-name">Order Status</th>
                            <th class="prd-name">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                          <td class="prd-name">BK0001</td>
                          <td class="prd_cate">Jono Triyono</td>
                          <td class="prd-dsc">Paid</td>
                          <td class="prd-sta">25000000</td>
                          <td class="prd-opt">
                            <form action="">
                              <select class="form-control-plaintext" id="kategori" disabled>
                                <option>Uang Penuh</option>
                                <option>Uang Muka</option>
                              </select>
                            </form>
                          </td>
                          <td class="prd-prc">2019-05-22</td>
                          <td class="prd-pr"><span class="highlight high-approve">Accept</span></td>
                          <td class="prd-name">
                            <a href="transact_detail" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i> View</a>
                          </td>
                    </tr>
                    <tr>
                          <td class="prd-name">BK0002</td>
                          <td class="prd_cate">Jono Triyono</td>
                          <td class="prd-dsc">Unpaid</td>
                          <td class="prd-sta">25000000</td>
                          <td class="prd-opt">
                            <form action="">
                              <select class="form-control" id="kategori">
                                <option>Uang Penuh</option>
                                <option>Uang Muka (Cicil)</option>
                              </select>
                            </form>
                          </td>
                          <td class="prd-prc">2019-05-23</td>
                          <td class="prd-pr"><span class="highlight high-cancel">Rejected</span></td>
                          <td class="prd-name">
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-eye" data-toggle="modal" data-target=".bd-example-modal-lg"></i> View</a> 
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header border-bottom-0">
                                              <h4 class="text-center" id="myLargeModalLabel">Form Tambah Paket</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-times-thin" aria-hidden="true"></i></span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form class="" >
                                                <div class="mb-3">
                                                  <label for="foto_p">Foto Produk</label>
                                                  <input type="file" class="form-control-file" id="lain" accept="image/*">
                                                </div>
                                                <div class="mb3">
                                                  <label for="nama_p">Nama Produk</label>
                                                  <input type="text" class="form-control" id="nama_p" placeholder="" value="" required="required">
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6 mb-3">
                                                    <label for="kategori">Kategori</label>
                                                    <select class="form-control" id="kategori">
                                                      <option>Catering</option>
                                                      <option>Wedding</option>
                                                      <option>Concert</option>
                                                      <option>Confrence</option>
                                                      <option>Party</option>
                                                      <option>Rental</option>
                                                    </select>
                                                  </div>
                                                  <div class="col-md-6 mb-3">
                                                    <label for="status_pk">Status Paket</label>
                                                    <select class="form-control" id="status_pk">
                                                      <option>Tersedia</option>
                                                      <option>Tidak Tersedia</option>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="address">Deskripsi</label>
                                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="lain">Foto Paket Lainnya <span class="text-muted">(Optional)</span></label>
                                                  <input type="file" class="form-control-file" id="lain" accept="image/*">
                                                </div>
                                                <div class="mb-3">
                                                  <label for="harga_pkt">Harga Paket </label>
                                                  <input type="text" class="form-control" id="harga_pkt" placeholder="100000">
                                                </div>
                                                <button class="btn btn-danger float right" type="submit">Cancel</button>
                                              </form>    
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                          </td>
                    </tr>
                    <tr>
                          <td class="prd-name">BK0003</td>
                          <td class="prd_cate">Joni Pirbadi</td>
                          <td class="prd-dsc">Unpaid</td>
                          <td class="prd-sta">25000000</td>
                          <td class="prd-opt">
                            <form action="">
                              <select class="form-control" id="kategori">
                                <option>Uang Penuh</option>
                                <option>Uang Muka (Cicil)</option>
                              </select>
                            </form>
                          </td>
                          <td class="prd-prc">2019-05-24</td>
                          <td class="prd-pr"><span class="highlight high-pending">Pending</span></td>
                          <td class="prd-name">
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-eye" data-toggle="modal" data-target=".bd-example-modal-lg"></i> View</a> 
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header border-bottom-0">
                                              <h4 class="text-center" id="myLargeModalLabel">Form Tambah Paket</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-times-thin" aria-hidden="true"></i></span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form class="" >
                                                <div class="mb-3">
                                                  <label for="foto_p">Foto Produk</label>
                                                  <input type="file" class="form-control-file" id="lain" accept="image/*">
                                                </div>
                                                <div class="mb3">
                                                  <label for="nama_p">Nama Produk</label>
                                                  <input type="text" class="form-control" id="nama_p" placeholder="" value="" required="required">
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6 mb-3">
                                                    <label for="kategori">Kategori</label>
                                                    <select class="form-control" id="kategori">
                                                      <option>Catering</option>
                                                      <option>Wedding</option>
                                                      <option>Concert</option>
                                                      <option>Confrence</option>
                                                      <option>Party</option>
                                                      <option>Rental</option>
                                                    </select>
                                                  </div>
                                                  <div class="col-md-6 mb-3">
                                                    <label for="status_pk">Status Paket</label>
                                                    <select class="form-control" id="status_pk">
                                                      <option>Tersedia</option>
                                                      <option>Tidak Tersedia</option>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="address">Deskripsi</label>
                                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="lain">Foto Paket Lainnya <span class="text-muted">(Optional)</span></label>
                                                  <input type="file" class="form-control-file" id="lain" accept="image/*">
                                                </div>
                                                <div class="mb-3">
                                                  <label for="harga_pkt">Harga Paket </label>
                                                  <input type="text" class="form-control" id="harga_pkt" placeholder="100000">
                                                </div>
                                                <button class="btn btn-danger float right" type="submit">Cancel</button>
                                              </form>    
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                          </td>
                    </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </div>                    		                            
    </section> 
    <br /><br /><br />
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

  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
