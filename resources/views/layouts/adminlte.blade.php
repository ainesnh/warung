<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.adminlte.partials.head')
    <style>
        /* --- TEMA CUSTOM OMAH TENGKLENG --- */
        
        /* 1. Reset Warna Hover Toggle (Hapus Biru) */
        .main-header .sidebar-toggle:hover {
            background-color: rgba(0,0,0,0.1) !important;
            color: #4ade80 !important;
        }

        /* 2. Pengaturan Header & Sidebar Terbuka */
        .main-header .logo { 
            width: 230px !important; 
            background-color: #04392b !important; 
            transition: width 0.3s ease-in-out;
            display: block;
            float: left;
        }
        .main-header .navbar { 
            margin-left: 230px !important; 
            background-image: linear-gradient(to right, #064e3b, #16a34a) !important;
            transition: margin-left 0.3s ease-in-out;
            border: none;
        }
        .main-sidebar { 
            width: 230px !important; 
            background-color: #064e3b !important; 
            transition: width 0.3s ease-in-out;
        }
        .content-wrapper { 
            margin-left: 230px !important; 
            transition: margin-left 0.3s ease-in-out; 
        }

        /* 3. Pengaturan Saat Sidebar Mini (Collapse) */
        .sidebar-collapse .main-header .logo { width: 50px !important; padding: 0 !important; }
        .sidebar-collapse .main-header .navbar { margin-left: 50px !important; }
        .sidebar-collapse .main-sidebar { width: 50px !important; }
        .sidebar-collapse .content-wrapper { margin-left: 50px !important; }

        /* Sembunyikan teks saat mode mini */
        .sidebar-collapse .logo-lg, 
        .sidebar-collapse .user-panel .info,
        .sidebar-collapse .sidebar-menu .header,
        .sidebar-collapse .sidebar-menu li span { 
            display: none !important; 
        }
        .sidebar-collapse .logo-mini { display: block !important; text-align: center; }

        /* 4. Styling Menu Sidebar (Hapus Biru Menu) */
        .sidebar-menu > li > a { 
            color: #4ade80 !important; /* Warna hijau seperti tombol Lihat Web */
        }
        .sidebar-menu > li > a > i {
            color: #4ade80 !important;
        }
        .sidebar-menu > li.active > a { 
            border-left-color: #4ade80 !important; 
            background: rgba(255,255,255,0.1) !important; 
            color: #ffffff !important; 
        }
        .sidebar-menu > li.active > a > i {
            color: #ffffff !important;
        }
        .sidebar-menu > li > a:hover { 
            color: #ffffff !important; 
            background: rgba(255,255,255,0.05) !important; 
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.adminlte.partials.header')
    @include('layouts.adminlte.partials.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1 style="font-weight: 700;">@yield('title', config('app.name', 'Laravel'))</h1>
            @yield('breadcrumb')
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('layouts.adminlte.partials.footer')
</div>

@include('layouts.adminlte.partials.scripts')
@stack('scripts')

<script>
    $(document).ready(function() {
        // Inisialisasi pushMenu agar toggle berfungsi
        $('[data-toggle="push-menu"]').pushMenu();
    });
</script>
</body>
</html>