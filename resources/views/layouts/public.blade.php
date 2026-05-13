<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/all.css') }}">
    
    <!-- Tambahkan CDN FontAwesome 5 agar ikon Award & Clock pasti muncul -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #ffffff; 
            color: #1a2e1a; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Memberikan jarak otomatis agar konten tidak nempel ke footer */
        main { 
            flex: 1; 
            padding-bottom: 50px; /* Jarak konten ke bagian reservasi/footer */
        }

        .site-nav { 
            background: #064e3b; 
            border: 0; border-radius: 0; margin-bottom: 0; padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .site-nav .navbar-brand { font-weight: 800; color: #fff !important; }
        .site-nav .navbar-nav > li > a { color: #dcfce7 !important; font-weight: 600; }
        .site-nav .navbar-nav > .active > a { color: #4ade80 !important; background: transparent !important; }

        /* Reservasi Section Simpel */
        .simple-cta {
            background: #f0fdf4;
            border-top: 1px solid #dcfce7;
            padding: 25px 0;
            margin-top: auto; /* Memastikan ini berada di bawah */
        }
        .btn-wa-small {
            background: #16a34a;
            color: white !important;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            text-decoration: none !important;
        }

        .footer { background: #052e16; color: #86efac; padding: 20px 0; }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-default site-nav">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-utensils"></i> {{ config('app.name') }}
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="{{ request()->routeIs('menu.*') ? 'active' : '' }}"><a href="{{ route('menu.index') }}">Menu</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="{{ request()->routeIs('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Bungkus Yield dengan Main untuk kontrol jarak -->
    <main>
        @yield('content')
    </main>

    <section class="simple-cta">
        <div class="container">
            <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
                <div class="col-xs-12 col-sm-8">
                    <h5 style="margin: 0; font-weight: 700; color: #064e3b;">
                        <i class="fas fa-calendar-check"></i> Reservasi & Pesanan Box
                    </h5>
                    <p class="text-muted mb-0 small">Siap melayani pesanan untuk acara keluarga dan kantor.</p>
                </div>
                <div class="col-xs-12 col-sm-4 text-right">
                    <!-- <a href="https://wa.me/628123456789" class="btn-wa-small shadow-sm">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp
                    </a> -->
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0 small"><strong>{{ config('app.name') }}</strong> &copy; ANH {{ date('Y') }}</p>
        </div>
    </footer>

    <script src="{{ asset('vendor/adminlte/js/app.js') }}"></script>
</body>
</html>