<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zenith EO - Platform terpercaya untuk menemukan Event Organizer profesional">
    <title>Zenith EO - Your Event Solution</title>

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700|Montserrat:400,500,600,700,800" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="{{ asset('css/modern.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header-inline.css') }}" rel="stylesheet">
    @yield('head')
    @stack('styles')
</head>
<body class="@yield('body_class')">
<!-- Navigation -->
<header id="header" @yield('header_attrs')>
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <h1 class="mb-0"><a href="{{ url('/') }}"><span>ZEN</span></a></h1>
        </div>

        <nav class="main-nav d-none d-lg-flex align-items-center">
            <ul class="nav main-nav-ul d-flex align-items-center mb-0 list-unstyled">
                @if(!Auth::guard('users')->check())
                    <li class="ml-3"><a href="{{ url('/paket') }}" class="px-3 py-2 nav-link-dark">Jelajahi Paket</a></li>
                    <li class="ml-3"><a href="{{ url('/login') }}" class="btn btn-outline-dark btn-sm px-3">Masuk</a></li>
                    <li class="ml-2"><a href="{{ url('/register') }}" class="btn btn-primary btn-sm px-3 text-white">Daftar</a></li>
                @elseif(Auth::guard('users')->user()->is_eo == 1)
                    <li class="ml-3"><a href="{{ url('/dashboard') }}" class="px-3 py-2 nav-link-dark">Dashboard</a></li>
                    <li class="ml-3"><a href="{{ url('/paket') }}" class="px-3 py-2 nav-link-dark">Jelajahi Paket</a></li>
                    <li class="ml-3"><a href="{{ url('/manage_paket') }}" class="px-3 py-2 nav-link-dark">Kelola Paket</a></li>
                    <li class="ml-3"><a href="{{ url('/orders') }}" class="px-3 py-2 nav-link-dark">Kelola Pesanan</a></li>
                    <li class="ml-3">
                        <a href="{{ url('/eo/notif') }}" class="px-3 py-2 nav-link-dark position-relative" title="Notifikasi">
                            <i class="fa fa-bell"></i>
                            <span id="notif-badge-eo" class="position-absolute badge-count" style="display:none">0</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown ml-2">
                        <a class="dropdown-toggle nav-link-dark px-3 py-2" href="#" role="button" data-toggle="dropdown">
                            <i class="fa fa-user-circle mr-1"></i>{{ Auth::guard('users')->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/user_profile') }}"><i class="fa fa-user mr-2"></i>Profil Saya</a>
                            <a class="dropdown-item" href="{{ url('/eo_profile/edit') }}"><i class="fa fa-building mr-2"></i>Profil EO</a>
                            <a class="dropdown-item" href="{{ url('/wishlist') }}"><i class="fa fa-heart mr-2"></i>Wishlist Saya</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out mr-2"></i>Sign Out</a>
                        </div>
                    </li>
                @else
                    <li class="ml-3"><a href="{{ url('/paket') }}" class="px-3 py-2 nav-link-dark">Jelajahi Paket</a></li>
                    <li class="ml-2"><a href="{{ url('/regist_eo') }}" class="px-3 py-2 nav-link-dark">Buka EO</a></li>
                    <li class="ml-3">
                        <a href="{{ url('/user/notif') }}" class="px-3 py-2 nav-link-dark position-relative" title="Notifikasi">
                            <i class="fa fa-bell"></i>
                            <span id="notif-badge-user" class="position-absolute badge-count" style="display:none">0</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown ml-2">
                        <a class="dropdown-toggle nav-link-dark px-3 py-2" href="#" role="button" data-toggle="dropdown">
                            <i class="fa fa-user-circle mr-1"></i>{{ Auth::guard('users')->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/edit_user') }}"><i class="fa fa-user mr-2"></i>Edit Profil</a>
                            <a class="dropdown-item" href="{{ url('/booking') }}"><i class="fa fa-shopping-bag mr-2"></i>Pesanan Saya</a>
                            <a class="dropdown-item" href="{{ url('/wishlist') }}"><i class="fa fa-heart mr-2"></i>Wishlist Saya</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out mr-2"></i>Sign Out</a>
                        </div>
                    </li>
                @endif
            </ul>
        </nav>

        <!-- Mobile Toggle -->
        <button type="button" class="mobile-nav-toggle d-lg-none">
            <i class="fa fa-bars"></i>
        </button>
    </div>
</header>

<!-- Mobile Navigation -->
<div class="mobile-nav">
    <div class="mobile-nav-header p-3">
        <h4 class="mb-0"><span class="text-white">ZEN</span></h4>
        <button type="button" class="mobile-nav-close text-white">&times;</button>
    </div>
    <ul class="mobile-nav-list p-3">
        @if(!Auth::guard('users')->check())
            <li><a href="{{ url('/paket') }}" class="mobile-nav-link"><i class="fa fa-compass mr-2"></i>Jelajahi Paket</a></li>
            <li><a href="{{ url('/login') }}" class="mobile-nav-link">Login</a></li>
            <li><a href="{{ url('/register') }}" class="mobile-nav-link mobile-nav-btn">Daftar</a></li>
        @elseif(Auth::guard('users')->user()->is_eo == 1)
            <li><a href="{{ url('/paket') }}" class="mobile-nav-link"><i class="fa fa-compass mr-2"></i>Jelajahi Paket</a></li>
            <li><a href="{{ url('/dashboard') }}" class="mobile-nav-link"><i class="fa fa-home mr-2"></i>Dashboard</a></li>
            <li><a href="{{ url('/orders') }}" class="mobile-nav-link"><i class="fa fa-shopping-bag mr-2"></i>Kelola Pesanan</a></li>
            <li><a href="{{ url('/eo/notif') }}" class="mobile-nav-link"><i class="fa fa-bell mr-2"></i>Notifikasi <span id="notif-badge-eo-mobile" class="badge badge-danger ml-1" style="display:none;font-size:11px;">0</span></a></li>
            <li><a href="{{ url('/user_profile') }}" class="mobile-nav-link"><i class="fa fa-user mr-2"></i>Profil Saya</a></li>
            <li><a href="{{ url('/eo_profile/edit') }}" class="mobile-nav-link"><i class="fa fa-building mr-2"></i>Profil EO</a></li>
            <li><a href="{{ url('/logout') }}" class="mobile-nav-link">Sign Out</a></li>
        @else
            <li><a href="{{ url('/paket') }}" class="mobile-nav-link"><i class="fa fa-compass mr-2"></i>Jelajahi Paket</a></li>
            <li><a href="{{ url('/regist_eo') }}" class="mobile-nav-link">{{ Auth::guard('users')->user()->name }}</a></li>
            <li><a href="{{ url('/edit_user') }}" class="mobile-nav-link"><i class="fa fa-user mr-2"></i>Edit Profil</a></li>
            <li><a href="{{ url('/booking') }}" class="mobile-nav-link"><i class="fa fa-shopping-bag mr-2"></i>Pesanan Saya</a></li>
            <li><a href="{{ url('/user/notif') }}" class="mobile-nav-link"><i class="fa fa-bell mr-2"></i>Notifikasi <span id="notif-badge-user-mobile" class="badge badge-danger ml-1" style="display:none;font-size:11px;">0</span></a></li>
            <li><a href="{{ url('/logout') }}" class="mobile-nav-link">Sign Out</a></li>
        @endif
    </ul>
</div>
<div class="mobile-nav-overlay"></div>

<!-- JavaScript Libraries -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

<!-- Template Main JavaScript File -->
<script src="{{ asset('js/main.js') }}"></script>

<!-- Notification JS -->
<script src="{{ asset('js/notification.js') }}"></script>

<script src="{{ asset('js/header-inline.js') }}"></script>
