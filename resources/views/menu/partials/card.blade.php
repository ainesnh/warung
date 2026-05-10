<div class="card-image-wrapper" style="position: relative; width: 100%; height: 200px; overflow: hidden; background-color: #f1f5f9;">
    @if ($menu->gambar)
        <img src="{{ asset($menu->gambar) }}" 
             alt="{{ $menu->nama_menu }}"
             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
    @else
        <div class="d-flex flex-column align-items-center justify-content-center h-100 text-muted">
            <i class="fas fa-image fa-2x opacity-25"></i>
        </div>
    @endif

    {{-- Badge Status --}}
    <div style="position: absolute; top: 10px; left: 10px;">
        @if($menu->status == 1)
            <span class="badge" style="background-color: #16a34a; font-size: 0.7rem; padding: 5px 10px; border-radius: 6px; color: white;">Tersedia</span>
        @else
            <span class="badge" style="background-color: #dc2626; font-size: 0.7rem; padding: 5px 10px; border-radius: 6px; color: white;">Habis</span>
        @endif
    </div>
</div>

<div class="card-body" style="padding: 20px 15px;"> 
    <h5 class="fw-bold text-dark" style="font-size: 1.1rem; line-height: 1.4; height: 2.8em; margin-bottom: 12px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
        {{ $menu->nama_menu }}
    </h5>
    <div class="fw-bold" style="font-size: 1.2rem; color: #16a34a; margin-bottom: 12px;">
        <span style="font-size: 0.9rem; font-weight: 600;">Rp</span>{{ number_format($menu->harga, 0, ',', '.') }}
    </div>
    <p class="text-muted" style="font-size: 0.85rem; line-height: 1.5; margin-bottom: 0; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">
        {{ $menu->deskripsi ?: '-' }}
    </p>
</div>

<style>
    .card {
        border: 1px solid #eef2f6 !important;
        border-radius: 20px !important;
        background: #ffffff;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }
    
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.1) !important;
        border-color: #d1d5db !important;
    }
</style>