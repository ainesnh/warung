@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner"><h3>{{ $totalMenu }}</h3><p>Total Menu</p></div>
                <div class="icon"><i class="fa fa-cutlery"></i></div>
                <a href="{{ route('admin.menus.index') }}" class="small-box-footer">Kelola <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner"><h3>{{ $menuTersedia }}</h3><p>Menu Tersedia</p></div>
                <div class="icon"><i class="fa fa-check-circle"></i></div>
                <a href="{{ route('admin.menus.index') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner"><h3>{{ $menuTidakTersedia }}</h3><p>Tidak Tersedia</p></div>
                <div class="icon"><i class="fa fa-times-circle"></i></div>
                <a href="{{ route('admin.menus.index') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Menu Terbaru</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menuTerbaru as $menu)
                        <tr>
                            <td>{{ $menu->nama_menu }}</td>
                            <td>{{ $menu->kategori }}</td>
                            <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td>{{ $menu->status === 'tersedia' ? 'Tersedia' : 'Tidak tersedia' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">Belum ada data menu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
