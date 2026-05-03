@extends('layouts.public')

@section('title', 'Daftar Menu - ' . config('app.name'))

@section('content')
    <!-- Hero Section Menu -->
    <section class="site-hero" style="background: linear-gradient(rgba(20, 50, 20, 0.8), rgba(20, 50, 20, 0.8)), url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; padding: 100px 0; color: white;">
        <div class="container text-center">
            <h1 class="display-4" style="font-weight: 800; margin-bottom: 10px;">Daftar Menu</h1>
            <div style="width: 60px; height: 4px; background: #4ade80; margin: 0 auto 20px auto; border-radius: 10px;"></div>
            <p class="lead" style="color: #e2e8f0; max-width: 600px; margin: 0 auto;">Eksplorasi ragam sajian autentik kami, mulai dari Tengkleng legendaris hingga minuman segar pelepas dahaga.</p>
        </div>
    </section>

    <!-- Menu List Section -->
    <section class="section-menu-list" style="padding: 80px 0; background-color: #ffffff;">
        <div class="container">
            <div class="row">
                @forelse ($menus as $menu)
                    <div class="col-sm-6 col-md-4 mb-5">
                        <!-- Card dengan style yang sama dengan Home -->
                        <div class="card h-100 border-0 shadow-sm hover-shadow" style="transition: 0.4s; border-radius: 20px; overflow: hidden; background: #fff; border: 1px solid #f0f0f0 !important;">
                            @include('menu.partials.card', ['menu' => $menu])
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center py-5">
                        <div class="p-5" style="border: 2px dashed #dcfce7; border-radius: 20px; background: #f9fafb;">
                            <i class="fas fa-utensils fa-3x text-muted mb-3" style="opacity: 0.3;"></i>
                            <h4 class="text-muted">Maaf, Menu Belum Tersedia</h4>
                            <p class="text-muted mb-0">Kami sedang memperbarui daftar menu lezat untuk Anda. Silakan kembali lagi nanti!</p>
                            <a href="{{ route('home') }}" class="btn btn-success mt-4" style="border-radius: 50px; background-color: #16a34a; border: none; padding: 10px 30px;">Kembali ke Beranda</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Menggunakan style yang sama dengan home untuk konsistensi */
    .hover-shadow:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
    }

    .site-hero h1 {
        animation: fadeInUp 0.8s ease-out;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Penyesuaian jarak konten ke footer jika menu sedikit */
    .section-menu-list {
        min-height: 60vh;
    }

    @media (max-width: 768px) {
        .site-hero { padding: 60px 0; }
        .site-hero h1 { font-size: 2.5rem; }
    }
</style>
@endpush