@extends('layout.auth')
@section('title', 'Daftar - Zenith EO')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/register_page.css') }}">
@endpush
@section('content')
<main class="auth-container">
    <div class="signup-content">
        <form method="POST" action="{{ url('/register') }}" id="signup-form" class="form-signin" novalidate>
            @csrf
            <h2 class="form-title text-center">Daftar Akun Baru</h2>

            <!-- Name Field -->
            <div class="form-group">
                <label for="inputNama" class="font-weight-bold">
                    <i class="fa fa-user"></i> Nama Lengkap
                </label>
                <input type="text"
                       name="name"
                       id="inputNama"
                       class="form-control"
                       placeholder="Masukkan nama lengkap Anda"
                       value="{{ old('name') }}"
                       autocomplete="off">
                <small class="error-message" id="nameError"></small>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="inputEmail" class="font-weight-bold">
                    <i class="fa fa-envelope"></i> Email
                </label>
                <input type="email"
                       name="email"
                       id="inputEmail"
                       class="form-control"
                       placeholder="Masukkan email Anda"
                       value="{{ old('email') }}"
                       autocomplete="off">
                <small class="error-message" id="emailError"></small>
            </div>

            <!-- Phone Field -->
            <div class="form-group">
                <label for="inputTelp" class="font-weight-bold">
                    <i class="fa fa-phone"></i> No. Telepon
                </label>
                <input type="text"
                       name="no_telp"
                       id="inputTelp"
                       class="form-control"
                       placeholder="Contoh: 081234567890"
                       value="{{ old('no_telp') }}"
                       autocomplete="off">
                <small class="error-message" id="noTelpError"></small>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="inputPassword" class="font-weight-bold">
                    <i class="fa fa-lock"></i> Password
                </label>
                <input type="password"
                       name="password"
                       id="inputPassword"
                       class="form-control"
                       placeholder="Minimal 8 karakter"
                       autocomplete="new-password">
                <small class="error-message" id="passwordError"></small>
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group">
                <label for="inputPasswordConfirm" class="font-weight-bold">
                    <i class="fa fa-lock"></i> Konfirmasi Password
                </label>
                <input type="password"
                       name="password_confirmation"
                       id="inputPasswordConfirm"
                       class="form-control"
                       placeholder="Ulangi password Anda"
                       autocomplete="new-password">
                <small class="error-message" id="passwordConfirmError"></small>
            </div>

            <!-- Terms -->
            <div class="form-group">
                <p class="term-service">
                    Dengan Mendaftar, Anda telah menyetujui
                    <a href="#" class="term-service-link">Syarat</a> dan
                    <a href="#" class="term-service-link">Ketentuan</a> Kami
                </p>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" id="submitBtn" class="btn btn-danger btn-block font-weight-bold">
                    <i class="fa fa-user-plus"></i> Daftar
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <p class="text-center">
            Sudah Punya Akun?
            <a href="{{ url('/login') }}" class="loginhere-link"> Masuk di Sini</a>
        </p>
    </div>
</main>

<script src="{{ asset('js/register-inline.js') }}"></script>
</script>
@endsection
