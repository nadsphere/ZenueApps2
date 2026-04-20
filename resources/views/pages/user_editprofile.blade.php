@extends('layout.app')
@section('body_class', 'is-profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/eo_profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/user-editprofile-inline.css') }}">
@endpush
@section('content')
<main id="main">
    <section class="py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Edit Profil</h1>
                <p class="page-subtitle">Perbarui informasi akun Anda</p>
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
                        <i class="fa fa-user"></i>
                    </div>
                    <h3>Informasi Akun</h3>
                </div>
                <div class="card-body-custom">
                    <form action="{{ url('/edit_user') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap <span class="text-muted">*</span></label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $user->name ?? '') }}"
                                   required
                                   minlength="4">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-muted">*</span></label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $user->email ?? '') }}"
                                   required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text"
                                   class="form-control @error('no_telp') is-invalid @enderror"
                                   id="no_telp"
                                   name="no_telp"
                                   value="{{ old('no_telp', $user->no_telp ?? '') }}"
                                   placeholder="Contoh: 081234567890"
                                   minlength="10"
                                   maxlength="15">
                            @error('no_telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
