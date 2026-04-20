@extends('layout.auth')
@section('title', 'Login - Zenith EO')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/login_page.css') }}">
@endpush
@section('content')
<main class="auth-container">
    <div class="signup-content">
        <form method="POST" action="{{ url('/login') }}" id="signup-form" class="form-signin" novalidate>
            @csrf
            <h2 class="form-title text-center">Login</h2>

            @if(session('success'))
                <div class="alert-success mb-3">
                    {{ session('success') }}
                </div>
            @endif

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
                       autocomplete="email"
                       autofocus>
                <small class="error-message" id="emailError"></small>
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
                       placeholder="Masukkan password Anda"
                       autocomplete="current-password">
                <small class="error-message" id="passwordError"></small>
            </div>

            <!-- Forgot Password -->
            <div class="form-group text-right">
                <a href="#" class="forgot-link">Lupa Password?</a>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" id="submitBtn" class="btn btn-danger btn-block font-weight-bold">
                    <i class="fa fa-sign-in"></i> Masuk
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <p class="text-center">
            Belum Punya Akun?
            <a href="{{ url('/register') }}" class="loginhere-link"> Daftar di Sini</a>
        </p>
    </div>
</main>

<script src="{{ asset('js/login-inline.js') }}"></script>
</script>
@endsection
