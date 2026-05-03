@extends('layouts.adminlte')

@section('title', 'Kelola Menu')

@section('content')
    {{-- Alert Success dengan sentuhan Emerald --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" style="background-color: #064e3b !important; border-color: #4ade80;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: white;">&times;</button>
            <i class="icon fa fa-check"></i> {{ session('success') }}
        </div>
    @endif

    <div class="box shadow-sm" style="border-top: 3px solid #064e3b; border-radius: 8px; overflow: hidden;">
        <div class="box-header with-border" style="background-color: #fcfcfc; padding: 15px;">
            <h3 class="box-title" style="font-weight: 700; color: #064e3b;">
                <i class="fa fa-book" style="margin-right: 5px;"></i> Daftar Menu Kuliner
            </h3>
            <div class="box-tools">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-flat" style="background-color: #16a34a; color: white; border-radius: 4px;">
                    <i class="fa fa-plus-circle"></i> Tambah Menu Baru
                </a>
            </div>
        </div>

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-striped" style="vertical-align: middle;">
                <thead>
                    <tr style="background-color: #064e3b; color: #ffffff;">
                        <th class="text-center" style="width: 100px; padding: 12px;">Foto</th>
                        <th style="padding: 12px;">Detail Menu</th>
                        <th style="padding: 12px;">Kategori</th>
                        <th style="padding: 12px;">Harga</th>
                        <th class="text-center" style="padding: 12px;">Status Persediaan</th>
                        <th class="text-center" style="width: 200px; padding: 12px;">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                @if ($menu->gambar)
                                    <img src="{{ asset($menu->gambar) }}" class="img-thumbnail" 
                                         style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                                @else
                                    <div style="width: 80px; height: 60px; background: #eee; display: flex; align-items: center; justify-content: center; border-radius: 4px; margin: auto;">
                                        <i class="fa fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td style="vertical-align: middle;">
                                <strong style="font-size: 1.1em; color: #064e3b;">{{ $menu->nama_menu }}</strong>
                                <div class="text-muted small" style="margin-top: 4px; line-height: 1.4;">
                                    {{ str($menu->deskripsi)->limit(70) }}
                                </div>
                            </td>
                            <td style="vertical-align: middle;">
                                <span class="badge bg-gray" style="font-weight: 500;">{{ $menu->kategori }}</span>
                            </td>
                            <td style="vertical-align: middle;">
                                <span style="font-weight: 700; color: #16a34a;">
                                    Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                @if($menu->status === 'tersedia')
                                    <span class="label" style="background-color: #16a34a; padding: 5px 10px; font-weight: 500;">Tersedia</span>
                                @else
                                    <span class="label" style="background-color: #dc2626; padding: 5px 10px; font-weight: 500;">Habis</span>
                                @endif
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <div class="btn-group">
                                    <form action="{{ route('admin.menus.toggle', $menu) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-default btn-sm" title="Ubah Status" style="border-radius: 4px 0 0 4px;">
                                            <i class="fa fa-refresh text-warning"></i>
                                        </button>
                                    </form>
                                    
                                    <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-default btn-sm" title="Edit Data">
                                        <i class="fa fa-pencil text-info"></i>
                                    </a>

                                    <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" style="display:inline;" onsubmit="return confirm('Ingin menghapus menu ini dari daftar?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-default btn-sm" title="Hapus Menu" style="border-radius: 0 4px 4px 0;">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 40px; color: #999;">
                                <i class="fa fa-folder-open-o fa-3x" style="display: block; margin-bottom: 10px;"></i>
                                Belum ada data menu yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($menus->hasPages())
            <div class="box-footer clearfix" style="background-color: #fcfcfc;">
                <div class="pull-right">
                    {{ $menus->links() }}
                </div>
            </div>
        @endif
    </div>

    <style>
        /* CSS Tambahan agar pagination mengikuti warna tema */
        .pagination > .active > a, 
        .pagination > .active > span, 
        .pagination > .active > a:hover, 
        .pagination > .active > span:hover {
            background-color: #064e3b !important;
            border-color: #064e3b !important;
        }
        .table-hover tbody tr:hover {
            background-color: #f0fdf4 !important; /* Hijau sangat muda saat hover */
        }
    </style>
@endsection