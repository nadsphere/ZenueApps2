@extends('layout.app')
@section('body_class', 'is-profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_profile.css') }}">
@endpush
@section('content')
<main id="main">
    <section class="py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Profil Saya</h1>
                <p class="page-subtitle">Kelola informasi akun Anda</p>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success-modern">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger-modern">{{ session('error') }}</div>
            @endif

            <!-- Profile Grid - Side by Side -->
            <div class="profile-grid">
                <!-- Account Info Card -->
                <div class="card">
                    <div class="card-header-custom">
                        <div class="card-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <h3>Informasi Akun</h3>
                    </div>
                    <div class="card-body-custom">
                        <div class="account-info">
                            <div class="info-item">
                                <span class="info-label">Nama Akun</span>
                                <span class="info-value">{{ $user->name ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email Akun</span>
                                <span class="info-value">{{ $user->email ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Status EO</span>
                                <span class="info-value">
                                    @if($user->is_eo == 1)
                                        <span class="badge badge-success">Event Organizer</span>
                                    @else
                                        <span class="badge badge-secondary">Pengguna</span>
                                    @endif
                                </span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tanggal Bergabung</span>
                                <span class="info-value">{{ $user->created_at->format('d M Y') ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Change Password Card -->
                <div class="card">
                    <div class="card-header-custom">
                        <div class="card-icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h3>Ubah Password</h3>
                    </div>
                    <div class="card-body-custom">
                        @if(session('password_success'))
                            <div class="alert alert-success-modern">{{ session('password_success') }}</div>
                        @endif
                        @if(session('password_error'))
                            <div class="alert alert-danger-modern">{{ session('password_error') }}</div>
                        @endif

                        <form action="{{ url('/user_profile/password') }}" method="POST">
                            @csrf
                            <div class="form-group-custom">
                                <label for="current_password">Password Lama</label>
                                <input type="password" class="form-control-custom" id="current_password" name="current_password" required>
                            </div>
                            <div class="form-group-custom">
                                <label for="new_password">Password Baru</label>
                                <input type="password" class="form-control-custom" id="new_password" name="new_password" required minlength="8">
                            </div>
                            <div class="form-group-custom">
                                <label for="confirm_password">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control-custom" id="confirm_password" name="new_password_confirmation" required>
                            </div>
                            <button type="submit" class="btn-submit">
                                <i class="fa fa-save"></i> Simpan Password Baru
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
