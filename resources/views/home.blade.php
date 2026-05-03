@extends('layouts.public')

@section('title', 'Home - ' . config('app.name'))

@section('content')
    <section class="site-hero">
        <div class="container">
            <h1>Omah Tengkleng Klangenan</h1>
            <p class="lead">Daftar menu dan informasi harga tersaji rapi untuk memudahkan pelanggan memilih hidangan.</p>
            <a href="{{ route('menu.index') }}" class="btn btn-default btn-lg">Lihat Menu</a>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>Menu Tersedia</h2>
                    <p>Menu yang tampil di halaman ini sudah disaring berdasarkan status ketersediaan dari admin.</p>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('menu.index') }}" class="btn btn-primary">Semua Menu</a>
                </div>
            </div>
            <div class="row">
                @forelse ($menus as $menu)
                    <div class="col-sm-6 col-md-4">
                        @include('menu.partials.card', ['menu' => $menu])
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-info">Belum ada menu tersedia.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
