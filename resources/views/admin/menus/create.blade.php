@extends('layouts.adminlte')

@section('title', 'Tambah Menu')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Menu</h3>
        </div>
        <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.menus.partials.form')
        </form>
    </div>
@endsection
