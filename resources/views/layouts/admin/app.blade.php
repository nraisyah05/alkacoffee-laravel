<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ALKA Admin State</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets-admin/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets-admin/assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets-admin/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    {{-- CSS --}}
    @include('layouts.admin.css')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>

    {{-- Sidebar --}}
    @include('layouts.admin.sidebar')

    <main class="content">

        {{-- Header --}}
        @include('layouts.admin.header')

        {{-- Main Content --}}
        @yield('content')

        {{-- Footer --}}
        @include('layouts.admin.footer')

    </main>

    {{-- JS (jQuery dll load dulu di sini) --}}
    @include('layouts.admin.js')

    {{-- Script halaman (setelah jQuery siap) --}}
    @yield('script')

</body>

</html>
