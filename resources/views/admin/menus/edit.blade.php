@extends('layouts.adminlte')

@section('title', 'Edit Menu')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Form Edit Menu</h3>
        </div>
        <form action="{{ route('admin.menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.menus.partials.form')
        </form>
    </div>
@endsection
