<div class="menu-card">
    @if ($menu->gambar)
        <img src="{{ asset($menu->gambar) }}" alt="{{ $menu->nama_menu }}">
    @else
        <img src="{{ asset('vendor/adminlte/img/AcachaAdminLTE600x314.png') }}" alt="{{ $menu->nama_menu }}">
    @endif
    <div class="body">
        <p class="text-muted">{{ $menu->kategori }}</p>
        <h3>{{ $menu->nama_menu }}</h3>
        <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
        <p>{{ $menu->deskripsi ?: 'Deskripsi menu belum tersedia.' }}</p>
    </div>
</div>
