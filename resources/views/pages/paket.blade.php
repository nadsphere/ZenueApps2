@extends('layout.app')
@section('body_class', 'is-package')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/paket.css') }}">
@endpush
@section('content')
<main id="main">
    <section class="py-5">
        <div class="container">
            <div class="bg-white paket-container">
                <header class="section-header">
                    <h3 class="title">Kelola Pesanan</h3>
                </header>

                <!-- Sort Filter Row -->
                <div class="sort-filter-row">
                    <label for="urut">Urut Berdasarkan</label>
                    <select class="form-control" id="urut">
                        <option>Kode Booking</option>
                        <option>Kode Bayar</option>
                        <option>Jenis Bayar</option>
                        <option>Nama User</option>
                    </select>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">ID Booking</th>
                                <th class="text-left">User</th>
                                <th class="text-left">Status Pembayaran</th>
                                <th class="text-left">Total (Rp)</th>
                                <th class="text-left">Jenis Bayar</th>
                                <th class="text-left">Tanggal</th>
                                <th class="text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $trans)
                            <tr>
                                <td class="text-left">{{ $trans->kode_booking }}</td>
                                <td class="text-left">{{ $trans->user->name ?? 'N/A' }}</td>
                                <td class="text-left">
                                    @if($trans->status_pembayaran == 0)
                                        <span class="badge badge-secondary">Belum Bayar</span>
                                    @elseif($trans->status_pembayaran == 1)
                                        <span class="badge badge-info">Sudah Bayar</span>
                                    @elseif($trans->status_pembayaran == 2)
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($trans->status_pembayaran == 3)
                                        <span class="badge badge-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td class="text-left">Rp {{ number_format($trans->paket->harga_paket ?? 0, 0, ',', '.') }}</td>
                                <td class="text-left">Uang Penuh</td>
                                <td class="text-left">{{ \Carbon\Carbon::parse($trans->created_at)->format('M d, Y') }}</td>
                                <td class="text-left">
                                    <a href="{{ url('/transact_detail/' . $trans->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i> Lihat</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Belum ada transaksi</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal - Detail Pesanan -->
<div class="modal fade" id="orderModal1" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="orderModalLabel">Detail Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto_p1">Foto Paket</label>
                                <input type="file" class="form-control-file" id="foto_p1" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="nama_p1">Nama Paket</label>
                                <input type="text" class="form-control" id="nama_p1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori1">Kategori</label>
                                <select class="form-control" id="kategori1">
                                    <option>Catering</option>
                                    <option>Wedding</option>
                                    <option>Concert</option>
                                    <option>Conference</option>
                                    <option>Party</option>
                                    <option>Rental</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_pk1">Status Paket</label>
                                <select class="form-control" id="status_pk1">
                                    <option>Tersedia</option>
                                    <option>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi1">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga_pkt1">Harga Paket (Rp)</label>
                        <input type="text" class="form-control" id="harga_pkt1" placeholder="100000">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="orderModal2" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="orderModalLabel2">Detail Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto_p2">Foto Paket</label>
                                <input type="file" class="form-control-file" id="foto_p2" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="nama_p2">Nama Paket</label>
                                <input type="text" class="form-control" id="nama_p2" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori2">Kategori</label>
                                <select class="form-control" id="kategori2">
                                    <option>Catering</option>
                                    <option>Wedding</option>
                                    <option>Concert</option>
                                    <option>Conference</option>
                                    <option>Party</option>
                                    <option>Rental</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_pk2">Status Paket</label>
                                <select class="form-control" id="status_pk2">
                                    <option>Tersedia</option>
                                    <option>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi2">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi2" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga_pkt2">Harga Paket (Rp)</label>
                        <input type="text" class="form-control" id="harga_pkt2" placeholder="100000">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
