@extends('layouts.public')

@section('title', 'Daftar Menu - ' . config('app.name'))

@section('content')
    <!-- Hero Section -->
    <section class="site-hero" style="background: linear-gradient(rgba(20, 50, 20, 0.8), rgba(20, 50, 20, 0.8)), url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; padding: 80px 0; color: white;">
        <div class="container text-center">
            <h1 class="display-4" style="font-weight: 800; margin-bottom: 10px;">Daftar Menu</h1>
            <div style="width: 60px; height: 4px; background: #4ade80; margin: 0 auto 20px auto; border-radius: 10px;"></div>
            <p class="lead" style="color: #e2e8f0; max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Eksplorasi ragam sajian autentik kami.</p>
        </div>
    </section>

    <!-- Menu List -->
    <section class="section-menu-list" style="padding: 60px 0; background-color: #f9fafb; min-height: 60vh;">
        <div class="container">
            <div class="row g-4">
                @forelse ($menus as $menu)
                    <div class="col-6 col-sm-4 col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow" style="transition: 0.4s; border-radius: 15px; overflow: hidden; background: #fff;">
                            @include('menu.partials.card', ['menu' => $menu])
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center py-5">
                        <div class="p-5" style="border: 2px dashed #dcfce7; border-radius: 20px; background: #fff;">
                            <i class="fas fa-utensils fa-3x text-muted mb-3" style="opacity: 0.3;"></i>
                            <h4 class="text-muted">Maaf, Menu Belum Tersedia</h4>
                            <a href="{{ route('home') }}" class="btn btn-success mt-4" style="border-radius: 50px; background-color: #16a34a;">Kembali ke Beranda</a>
                        </div>
                    </div>
                @endforelse
            </div>
            
            {{-- Pagination Safe Check --}}
            @if (method_exists($menus, 'links'))
                <div class="d-flex justify-content-center mt-5">
                    {{ $menus->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
<style>
    .hover-shadow:hover { transform: translateY(-8px) !important; box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important; }
    .pagination > li > a, .pagination > li > span { color: #16a34a !important; }
    .pagination > .active > a, .pagination > .active > span { background-color: #16a34a !important; border-color: #16a34a !important; color: white !important; }
</style>
@endpush