@extends('layout.app')
@section('content')
    <style>
      .fa-times-thin:before {
        content: '\00d7';
      }
    </style>
<body>
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
                            <td><a href="{{url('edit_data/'.$value->id)}}" data-toggle="modal" data-target="#editpaket{{$value->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
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
@endsection