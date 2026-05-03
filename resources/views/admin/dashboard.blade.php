@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Admin <small>Omah Tengkleng Klangenan</small></h1>
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal" style="border-radius: 15px; overflow: hidden; transition: 0.3s;">
                <div class="inner">
                    <h3>{{ $totalMenu }}</h3>
                    <p style="font-weight: 600;">Total Seluruh Menu</p>
                </div>
                <div class="icon">
                    <i class="fa fa-utensils" style="opacity: 0.4;"></i>
                </div>
                <a href="{{ route('admin.menus.index') }}" class="small-box-footer" style="background: rgba(0,0,0,0.1);">
                    Kelola Semua <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green" style="border-radius: 15px; overflow: hidden; transition: 0.3s;">
                <div class="inner">
                    <h3>{{ $menuTersedia }}</h3>
                    <p style="font-weight: 600;">Menu Siap Saji (Tersedia)</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-circle" style="opacity: 0.4;"></i>
                </div>
                <a href="{{ route('admin.menus.index') }}" class="small-box-footer" style="background: rgba(0,0,0,0.1);">
                    Lihat Detail <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red" style="border-radius: 15px; overflow: hidden; transition: 0.3s;">
                <div class="inner">
                    <h3>{{ $menuTidakTersedia }}</h3>
                    <p style="font-weight: 600;">Menu Habis / Kosong</p>
                </div>
                <div class="icon">
                    <i class="fa fa-times-circle" style="opacity: 0.4;"></i>
                </div>
                <a href="{{ route('admin.menus.index') }}" class="small-box-footer" style="background: rgba(0,0,0,0.1);">
                    Cek Stok <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success" style="border-top-width: 3px; border-radius: 10px;">
                <div class="box-header with-border">
                    <h3 class="box-title" style="font-weight: 700; color: #064e3b;">
                        <i class="fa fa-history mr-2" style="margin-right: 10px;"></i> Penambahan Menu Terbaru
                    </h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.menus.create') }}" class="btn btn-sm btn-success shadow-sm" style="border-radius: 5px;">
                            <i class="fa fa-plus"></i> Tambah Menu Baru
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead style="background-color: #f9fafb;">
                            <tr>
                                <th style="padding: 15px;">Nama Menu</th>
                                <th style="padding: 15px;">Kategori</th>
                                <th style="padding: 15px;">Harga</th>
                                <th style="padding: 15px;" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menuTerbaru as $menu)
                                <tr>
                                    <td style="padding: 12px 15px; font-weight: 600; color: #333;">{{ $menu->nama_menu }}</td>
                                    <td style="padding: 12px 15px;">
                                        <span class="label label-default" style="font-size: 0.85rem; background-color: #e2e8f0; color: #475569;">
                                            {{ $menu->kategori }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px 15px; color: #16a34a; font-weight: bold;">
                                        Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                    </td>
                                    <td style="padding: 12px 15px;" class="text-center">
                                        @if($menu->status === 'tersedia')
                                            <span class="badge bg-green" style="padding: 5px 12px; border-radius: 50px;">Tersedia</span>
                                        @else
                                            <span class="badge bg-red" style="padding: 5px 12px; border-radius: 50px;">Kosong</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center" style="padding: 30px;">
                                        <i class="fa fa-info-circle fa-2x text-muted" style="margin-bottom: 10px;"></i>
                                        <p class="text-muted">Belum ada data menu yang tersimpan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{ route('admin.menus.index') }}" class="uppercase" style="font-weight: 600; color: #16a34a;">Lihat Semua Koleksi Menu</a>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Haluskan tampilan Small Box AdminLTE */
    .small-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .small-box .inner h3 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 5px;
    }
    .table-hover tbody tr:hover {
        background-color: #f0fdf4 !important;
    }
</style>
@endpush