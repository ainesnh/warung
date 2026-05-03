@extends('layouts.public')

@section('title', 'Menu - ' . config('app.name'))

@section('content')
    <section class="site-hero">
        <div class="container">
            <h1>Daftar Menu</h1>
            <p class="lead">Pilihan makanan dan minuman yang sedang tersedia.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
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
