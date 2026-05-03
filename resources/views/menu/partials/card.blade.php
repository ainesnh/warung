<!-- 1. AREA GAMBAR (INFO GAMBAR SAJA) -->
<div class="position-relative" style="height: 220px; overflow: hidden; background-color: #f8fafc; border-radius: 20px 20px 0 0;">
    @if ($menu->gambar)
        <img src="{{ asset($menu->gambar) }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="{{ $menu->nama_menu }}">
    @else
        <div class="d-flex flex-column align-items-center justify-content-center h-100 text-muted" style="background: #f1f5f9;">
            <i class="fas fa-image fa-3x mb-2" style="opacity: 0.1;"></i>
            <span style="font-size: 0.8rem; font-weight: 700; opacity: 0.3; letter-spacing: 2px;">GAMBAR TIDAK TERSEDIA</span>
        </div>
    @endif
    
    <!-- Badge Tersedia (Hanya status ketersediaan, tanpa embel-embel lain) -->
    <div class="position-absolute" style="top: 20px; left: 20px;">
        @if($menu->status == 1)
            <span class="badge" style="background-color: #16a34a;">Tersedia</span>
        @else
            <span class="badge" style="background-color: #dc2626;">Habis</span>
        @endif
    </div>
</div>

<!-- 2. AREA KONTEN (URUTAN: NAMA -> HARGA -> DESKRIPSI) -->
<div class="card-body" style="padding: 8px 8px;"> {{-- Padding ekstra luas agar tidak meper --}}
    
    <!-- Nama Menu (Ukuran Besar) -->
    <h3 class="fw-bold text-dark" style="font-size: 1.8rem; line-height: 1.2; margin-bottom: 15px; letter-spacing: -1px;">
        {{ $menu->nama_menu }}
    </h3>

    <!-- Harga (Tepat di bawah Nama) -->
    <div class="fw-bold" style="font-size: 1.5rem; color: #16a34a; margin-bottom: 25px;">
        <span style="font-size: 1.1rem; font-weight: 600;">Rp</span>{{ number_format($menu->harga, 0, ',', '.') }}
    </div>

    <!-- Deskripsi (Di paling bawah) -->
    <p class="text-muted" style="font-size: 1.2rem; line-height: 1.7; margin-bottom: 0; font-weight: 400;">
        {{ $menu->deskripsi ?: '-' }}
    </p>

</div>

<style>
    /* Styling Card agar terlihat kokoh dan elegan */
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