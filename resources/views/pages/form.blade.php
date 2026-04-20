@extends('layout.app')
@section('body_class', 'is-form')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/form_ambilpaket.css') }}">
@endpush
@section('content')
<section class="section-content padding-y">
    <div class="container">
        <div class="bg-white mt-5 p-4" style="border-radius:12px; box-shadow:0 4px 20px rgba(44,62,80,0.08);">
            <header class="section-header">
                <h3 class="title">Form Ambil Paket</h3>
            </header>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{ url('/form_paket') }}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label for="nama_cust" class="col-sm-3 col-form-label"><b>Nama Pembeli</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="nama_cust" value="{{ $user_nama ?? '' }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b>Email</b></label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" value="{{ $user->email ?? '' }}" name="email" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telpon" class="col-sm-3 col-form-label"><b>Nomor Telepon</b></label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="no_telp" value="{{ $user->no_telp ?? '' }}" readonly id="telpon" placeholder="0813xxxx">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_book" class="col-sm-3 col-form-label"><b>Kode Booking</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" value="EO-{{ mt_rand(100000, 999999) }}" id="kode_book" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_barang" class="col-sm-3 col-form-label"><b>Nama Paket yang Diambil</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_barang" name="nama_paket" value="{{ $paket->nama_paket ?? '' }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="des_pkt" class="col-sm-3 col-form-label"><b>Deskripsi</b></label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi_pkt" class="form-control" id="des_pkt" rows="3" readonly>{{ $paket->deskripsi ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_acara" class="col-sm-3 col-form-label"><b>Tanggal Acara</b></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tgl_acara" name="tanggalacara">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_paket" class="col-sm-3 col-form-label"><b>Harga Paket</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="harga_paket" name="harga_paket" value="{{ $paket->harga_paket ?? '' }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Pembayaran</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" value="Transfer" readonly>
                            </div>
                        </div>
                        <br />
                        <div class="text-center">
                            <button class="btn btn-outline-secondary" type="reset">Kembali</button>
                            <button class="btn btn-danger font-weight-bold" type="submit">Ambil Paket</button>
                        </div>
                        <br /><br />
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</section>
@endsection
