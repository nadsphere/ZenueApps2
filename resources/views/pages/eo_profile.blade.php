@extends('layout.app')
@section('body_class', 'is-eo-profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/eo_profile.css') }}">
@endpush
@section('content')
<main id="main">
    <section class="py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Profil Event Organizer</h1>
                <p class="page-subtitle">Kelola informasi profil EO Anda</p>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success-modern">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger-modern">{{ session('error') }}</div>
            @endif

            <!-- Profile Info Card -->
            <div class="card">
                <div class="card-header-custom">
                    <div class="card-icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <h3>Informasi EO</h3>
                </div>
                <div class="card-body-custom">
                    <form action="{{ url('/eo_profile/update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_eo">Nama Event Organizer</label>
                            <input type="text" class="form-control" id="nama_eo" name="nama_eo" value="{{ $eo->nama_eo ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $eo->email ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $eo->alamat ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $eo->no_telp ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="link_website">Link Website <span class="text-muted">(opsional)</span></label>
                            <input type="text" class="form-control" id="link_website" name="link_website" value="{{ $eo->link_website ?? '' }}" placeholder="https://example.com">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $eo->deskripsi ?? '' }}</textarea>
                        </div>

                        <hr style="margin: 30px 0;">

                        <h5 style="color: #2c3e50; margin-bottom: 20px;">
                            <i class="fa fa-lock mr-2"></i>Ubah Password
                        </h5>

                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password"
                                   class="form-control @error('current_password') is-invalid @enderror"
                                   id="current_password"
                                   name="current_password"
                                   placeholder="Masukkan password lama"
                                   minlength="8">
                            @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password"
                                   class="form-control @error('new_password') is-invalid @enderror"
                                   id="new_password"
                                   name="new_password"
                                   placeholder="Minimal 8 karakter"
                                   minlength="8">
                            @error('new_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password"
                                   class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                   id="new_password_confirmation"
                                   name="new_password_confirmation"
                                   placeholder="Ulangi password baru"
                                   minlength="8">
                            @error('new_password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
