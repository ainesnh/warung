<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/all.css') }}">
    <style>
        body { background: #f7f5f0; color: #2f2f2f; }
        .site-nav { background: #7a2f20; border: 0; border-radius: 0; margin-bottom: 0; }
        .site-nav .navbar-brand, .site-nav .navbar-nav > li > a { color: #fff; }
        .site-hero { background: #8f3b28; color: #fff; padding: 48px 0; }
        .site-hero h1 { font-weight: 700; margin-top: 0; }
        .menu-card { background: #fff; border: 1px solid #e4ded4; border-radius: 4px; margin-bottom: 20px; min-height: 290px; overflow: hidden; }
        .menu-card img { width: 100%; height: 160px; object-fit: cover; background: #ddd; }
        .menu-card .body { padding: 15px; }
        .price { color: #7a2f20; font-weight: 700; }
        .section { padding: 32px 0; }
        .footer { background: #2f2f2f; color: #ddd; padding: 20px 0; margin-top: 32px; }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-default site-nav">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ request()->routeIs('menu.index') ? 'active' : '' }}"><a href="{{ route('menu.index') }}">Menu</a></li>
                <li><a href="{{ route('login') }}">Admin</a></li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <strong>{{ config('app.name') }}</strong>
            <span class="pull-right">Informasi menu warung makan</span>
        </div>
    </footer>
    <script src="{{ asset('vendor/adminlte/js/app.js') }}"></script>
</body>
</html>
