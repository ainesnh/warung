@extends('layouts.adminlte')

@section('title', 'Kelola Menu')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Menu</h3>
            <div class="box-tools">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah Menu
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 80px;">Gambar</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr>
                            <td>
                                @if ($menu->gambar)
                                    <img src="{{ asset($menu->gambar) }}" alt="{{ $menu->nama_menu }}" style="width: 64px; height: 48px; object-fit: cover;">
                                @else
                                    <span class="label label-default">Tanpa gambar</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $menu->nama_menu }}</strong>
                                <p class="text-muted" style="margin: 4px 0 0;">{{ str($menu->deskripsi)->limit(80) }}</p>
                            </td>
                            <td>{{ $menu->kategori }}</td>
                            <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="label {{ $menu->status === 'tersedia' ? 'label-success' : 'label-danger' }}">
                                    {{ $menu->status === 'tersedia' ? 'Tersedia' : 'Tidak tersedia' }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.menus.toggle', $menu) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning btn-xs">
                                        <i class="fa fa-refresh"></i> Status
                                    </button>
                                </form>
                                <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-info btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data menu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{ $menus->links() }}
        </div>
    </div>
@endsection
