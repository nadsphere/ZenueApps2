@extends('layout.auth')
@section('title', 'Daftar EO - Zenith EO')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/register_eo.css') }}">
@endpush
@section('content')
<main class="auth-container">
    <div class="signup-content">
        <form method="POST" action="{{ url('/registereo') }}" id="signup-form" class="form-signin" novalidate>
            @csrf
            <h2 class="form-title text-center">Daftar Event Organizer</h2>
            <p class="form-subtitle text-center">Lengkapi data EO Anda di bawah ini</p>

            <!-- Nama EO Field -->
            <div class="form-group">
                <label for="inputNamaEo" class="font-weight-bold">
                    <i class="fa fa-building"></i> Nama Event Organizer
                </label>
                <input type="text"
                       name="nama_eo"
                       id="inputNamaEo"
                       class="form-control"
                       placeholder="Masukkan nama EO Anda"
                       autocomplete="off">
                <small class="error-message" id="namaEoError"></small>
            </div>

            <!-- Email EO Field -->
            <div class="form-group">
                <label for="inputEmailEo" class="font-weight-bold">
                    <i class="fa fa-envelope"></i> Email EO
                </label>
                <input type="email"
                       name="email"
                       id="inputEmailEo"
                       class="form-control"
                       placeholder="Masukkan email EO Anda"
                       autocomplete="off">
                <small class="error-message" id="emailEoError"></small>
            </div>

            <!-- Alamat Field -->
            <div class="form-group">
                <label for="inputAlamat" class="font-weight-bold">
                    <i class="fa fa-map-marker"></i> Alamat
                </label>
                <input type="text"
                       name="alamat"
                       id="inputAlamat"
                       class="form-control"
                       placeholder="Masukkan alamat lengkap"
                       autocomplete="off">
                <small class="error-message" id="alamatError"></small>
            </div>

            <!-- Kontak Field -->
            <div class="form-group">
                <label for="inputKontak" class="font-weight-bold">
                    <i class="fa fa-phone"></i> Kontak / No. Telepon
                </label>
                <input type="text"
                       name="kontak"
                       id="inputKontak"
                       class="form-control"
                       placeholder="Contoh: 081234567890"
                       autocomplete="off">
                <small class="error-message" id="kontakError"></small>
            </div>

            <!-- Link Website Field (Optional) -->
            <div class="form-group">
                <label for="inputLink" class="font-weight-bold">
                    <i class="fa fa-globe"></i> Link Website
                    <span class="text-muted">(opsional)</span>
                </label>
                <input type="text"
                       name="link"
                       id="inputLink"
                       class="form-control"
                       placeholder="https://example.com"
                       autocomplete="off">
                <small class="error-message" id="linkError"></small>
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
                    <i class="fa fa-building"></i> Daftar Event Organizer
                </button>
            </div>
        </form>

        <!-- Back Link -->
        <p class="text-center">
            <a href="{{ url('/') }}" class="back-link">
                <i class="fa fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </p>
    </div>
</main>

<script src="{{ asset('js/register-eo-inline.js') }}"></script>
</script>
@endsection
