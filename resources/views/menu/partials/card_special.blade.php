<div class="card border-0 shadow-sm overflow-hidden mb-5 w-100"
     style="
        border-radius: 24px; {{-- Dibulatkan sedikit lagi agar lebih modern --}}
        background: #fff;
        padding: 15px; {{-- INI KUNCINYA: Memberi jarak agar konten tidak mepet garis --}}
     ">

    <div class="row g-0 align-items-center">
        <div class="col-md-3">
            {{-- Wrapper Foto dengan radius --}}
            <div style="
                height: 220px;
                overflow: hidden;
                background-color: #f1f5f9;
                border-radius: 18px; {{-- Foto ikut melengkung di dalam card --}}
                position: relative;
            ">

            @if ($menu->gambar)
                <img src="{{ asset($menu->gambar) }}"
                    alt="{{ $menu->nama_menu }}"
                    style="width: 100%; height: 100%; object-fit: cover; transition: transform .4s ease;
                ">
            @else
                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                    <i class="fas fa-image fa-2x opacity-25"></i>
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-9">
        <div class="card-body py-3 px-4 px-md-5">
            <div class="mb-2">
                <span class="badge text-white"
                    style="background: #16a34a; padding: 8px 16px; border-radius: 50px; font-size: .75rem; letter-spacing: 0.5px;
                    "> ⭐ Rekomendasi Spesial
                </span>
            </div>

            <h2 class="fw-bold text-dark mb-1" style="font-size: 2.2rem; line-height: 1.2;"> {{ $menu->nama_menu }} </h2>

            <div class="fw-bold mb-3" style="font-size: 1.8rem; color: #16a34a;">
                <span style="font-size: 1.2rem;">Rp</span> {{ number_format($menu->harga, 0, ',', '.') }}
            </div>

            <p class="text-muted mb-4" style="line-height: 1.7; font-size: 1rem; max-width: 650px;">
                {{ $menu->deskripsi ?: 'Nikmati hidangan spesial dengan rasa autentik dan bahan pilihan terbaik.' }}
            </p>

            <div class="d-flex gap-4 align-items-center flex-wrap pt-2" style="border-top: 1px solid #f8f9fa;">
                @if($menu->status == 1)
                    <span class="text-success fw-semibold small"> <i class="fa fa-check-circle me-1"></i> Tersedia </span>
                @else
                    <span class="text-danger fw-semibold small"> <i class="fa fa-times-circle me-1"></i> Habis </span>
                 @endif
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: all .4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px rgba(0,0,0,.1) !important;
    }

    .card:hover img {
        transform: scale(1.08);
    }
</style>