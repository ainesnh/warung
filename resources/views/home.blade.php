@extends('layouts.public')

@section('title', 'Home - ' . config('app.name'))

@section('content')
    <!-- Hero Section -->
    <section class="site-hero" style="background: linear-gradient(rgba(20, 50, 20, 0.7), rgba(20, 50, 20, 0.7)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; padding: 140px 0; color: white;">
        <div class="container text-center">
            <h1 class="display-4" style="font-weight: 800; margin-bottom: 20px; letter-spacing: -1px;">Cita Rasa Autentik <br><span style="color: #4ade80;">Omah Tengkleng Klangenan</span></h1>
            <p class="lead" style="font-size: 1.25rem; margin-bottom: 40px; max-width: 750px; margin-left: auto; margin-right: auto; color: #e2e8f0;">
                Menghadirkan warisan resep nusantara dengan kelezatan daging kambing pilihan dan racikan rempah hijau alami yang meresap hingga ke tulang.
            </p>
        </div>
    </section>

    <!-- Menu Hari Ini Section -->
    <section id="menu-hari-ini" style="background-color: #f0fdf4; padding: 100px 0;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge badge-success px-3 py-2 mb-2" style="background-color: #16a34a; border-radius: 20px;">Spesial & Terbatas</span>
                <h2 style="font-weight: 800; color: #064e3b; margin-top: 10px;">Menu Rekomendasi Hari Ini</h2>
                <p class="text-muted">Pilihan menu terfavorit yang disiapkan khusus oleh chef kami pagi ini.</p>
            </div>

            <div class="row">
                @forelse ($menus->take(3) as $menu)
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow" style="transition: 0.4s; border-radius: 20px; overflow: hidden; background: #fff;">
                            <div class="special-tag" style="position: absolute; top: 15px; left: 15px; z-index: 10; background: #ffc107; color: #000; padding: 5px 15px; border-radius: 50px; font-weight: 700; font-size: 0.8rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                Best Seller
                            </div>
                            @include('menu.partials.card', ['menu' => $menu])
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <p class="text-muted italic">Menu spesial hari ini sedang disiapkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Semua Menu Section -->
    <section class="section-all-menu" style="padding: 100px 0; background: #fff;">
        <div class="container">
            <!-- Row ini menggunakan flexbox untuk memastikan tombol terdorong ke kanan -->
            <div class="row mb-5" style="display: flex; align-items: center; justify-content:建设-between; flex-wrap: wrap;">
                <div class="col-md-7">
                    <h2 style="font-weight: 800; color: #064e3b; margin: 0;">Daftar Menu Lengkap</h2>
                    <div style="width: 60px; height: 5px; background: #16a34a; border-radius: 10px; margin-top: 10px; margin-bottom: 15px;"></div>
                    <p class="text-muted">Temukan berbagai hidangan lezat lainnya untuk memanjakan lidah Anda.</p>
                </div>
                <!-- Menggunakan text-right dan padding-right agar benar-benar mepet kanan -->
                <div class="col-md-5 text-right" style="padding-right: 15px;">
                    <a href="{{ route('menu.index') }}" class="btn-explore">
                        <span>Jelajahi Semua Menu</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                @forelse ($menus as $menu)
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow" style="transition: 0.4s; border-radius: 20px; overflow: hidden; border: 1px solid #f0f0f0 !important;">
                            @include('menu.partials.card', ['menu' => $menu])
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center py-5">
                        <div class="p-5" style="border: 2px dashed #dcfce7; border-radius: 20px; background: #f9fafb;">
                            <i class="fas fa-utensils fa-3x text-muted mb-3" style="opacity: 0.3;"></i>
                            <p class="text-muted mb-0">Belum ada menu yang tersedia saat ini.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Styling Tombol Jelajahi */
    .btn-explore {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 12px 28px;
        background-color: #fff;
        color: #16a34a;
        border: 2px solid #16a34a;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none !important;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(22, 163, 74, 0.1);
    }

    .btn-explore i {
        transition: transform 0.3s ease;
    }

    .btn-explore:hover {
        background-color: #16a34a;
        color: #fff !important;
        box-shadow: 0 10px 15px rgba(22, 163, 74, 0.2);
        transform: translateY(-2px);
    }

    .btn-explore:hover i {
        transform: translateX(5px);
    }

    /* Smooth transition untuk card */
    .hover-shadow:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
    }
    
    .site-hero h1 {
        text-shadow: 0 4px 6px rgba(0,0,0,0.3);
        animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    html {
        scroll-behavior: smooth;
    }

    @media (max-width: 768px) {
        .site-hero h1 { font-size: 2.5rem; }
        #menu-hari-ini, .section-all-menu { padding: 60px 0 !important; }
        /* Di mobile, tombol kembali ke tengah atau kiri agar rapi */
        .text-right { text-align: left !important; margin-top: 15px; }
    }
</style>
@endpush