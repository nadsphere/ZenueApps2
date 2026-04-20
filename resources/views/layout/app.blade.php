@include('layout.header')
<main id="main" class="@yield('main_class', 'section-bg2')">
    @yield('content')
</main>
@include('layout.footer')
