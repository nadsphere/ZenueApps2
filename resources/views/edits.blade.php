@extends('layout.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Paket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2><i class="fa fa-edit"></i> Edit Paket</h2>
        <hr>

        @if(isset($paket))
        <form action="{{ url('/update/'.$paket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" class="form-control" name="nama_paket" value="{{ $paket->nama_paket }}" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option value="Catering" {{ $paket->kategori == 'Catering' ? 'selected' : '' }}>Catering</option>
                    <option value="Wedding" {{ $paket->kategori == 'Wedding' ? 'selected' : '' }}>Wedding</option>
                    <option value="Concert" {{ $paket->kategori == 'Concert' ? 'selected' : '' }}>Concert</option>
                    <option value="Conference" {{ $paket->kategori == 'Conference' ? 'selected' : '' }}>Conference</option>
                    <option value="Party" {{ $paket->kategori == 'Party' ? 'selected' : '' }}>Party</option>
                    <option value="Rental" {{ $paket->kategori == 'Rental' ? 'selected' : '' }}>Rental</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="available">
                    <option value="yes" {{ $paket->available == 'yes' ? 'selected' : '' }}>Tersedia</option>
                    <option value="no" {{ $paket->available == 'no' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="3">{{ $paket->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label>Harga Paket</label>
                <input type="number" class="form-control" name="harga_paket" value="{{ $paket->harga_paket }}" required>
            </div>
            <div class="form-group">
                <label>Ganti Foto (opsional)</label>
                <input type="file" class="form-control-file" name="gambar_paket">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ url('/paket') }}" class="btn btn-secondary">Batal</a>
        </form>
        @else
        <div class="alert alert-danger">Paket tidak ditemukan.</div>
        <a href="{{ url('/paket') }}" class="btn btn-secondary">Kembali</a>
        @endif
    </div>
</body>
</html>
@endsection
