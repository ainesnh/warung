@extends('layouts.adminlte')

@section('title', 'Kelola Menu')

@section('content')
    <style>
        .alert-floating {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 250px;
            max-width: 350px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-left: 5px solid #4ade80 !important;
        }
    </style>

    {{-- Alert AJAX --}}
    <div id="ajax-alert" style="display: none;" class="alert alert-success alert-dismissible alert-floating" style="background-color: #064e3b !important; color: white;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: white;">&times;</button>
        <i class="icon fa fa-check"></i> <span id="ajax-message"></span>
    </div>

    {{-- Alert Session --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible alert-floating" style="background-color: #064e3b !important; color: white;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: white;">&times;</button>
            <i class="icon fa fa-check"></i> {{ session('success') }}
        </div>
    @endif

    <div class="box shadow-sm" style="border-top: 3px solid #064e3b; border-radius: 8px; overflow: hidden;">
        <div class="box-header with-border" style="background-color: #fcfcfc; padding: 15px;">
            <h3 class="box-title" style="font-weight: 700; color: #064e3b;">
                <i class="fa fa-book" style="margin-right: 5px;"></i> Daftar Menu Kuliner
            </h3>

            @if(auth()->user()->isAdmin())
                <div class="box-tools">
                    <a href="{{ route('admin.menus.create') }}" class="btn btn-flat" style="background-color: #16a34a; color: white; border-radius: 4px;">
                        <i class="fa fa-plus-circle"></i> Tambah Menu Baru
                    </a>
                </div>
            @endif
        </div>

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-striped" style="vertical-align: middle;">
                <thead>
                    <tr style="background-color: #064e3b; color: #ffffff;">
                        <th class="text-center" style="width: 100px; padding: 12px;">Foto</th>
                        <th style="padding: 12px;">Detail Menu</th>
                        <th style="padding: 12px;">Kategori</th>
                        <th style="padding: 12px;">Harga</th>
                        <th class="text-center" style="padding: 12px;">Status</th>
                        <th class="text-center" style="width: 150px; padding: 12px;">Aksi</th>
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
                                <button type="button" 
                                        class="btn btn-toggle-status" 
                                        data-id="{{ $menu->id }}"
                                        data-url="{{ route('admin.menus.toggle-status', $menu) }}"
                                        style="border: none; background: transparent; padding: 0;">
                                    <span id="label-status-{{ $menu->id }}" class="label" 
                                          style="background-color: {{ $menu->status ? '#16a34a' : '#dc2626' }}; padding: 8px 12px; font-weight: 500; cursor: pointer; border-radius: 4px; display: inline-block;">
                                        {{ $menu->status ? 'Tersedia' : 'Habis' }}
                                    </span>
                                </button>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <div class="btn-group">
                                    {{-- Toggle Special --}}
                                    <button type="button" 
                                            class="btn btn-default btn-sm btn-toggle-special" 
                                            data-url="{{ route('admin.menus.toggle-special', $menu) }}"
                                            title="Ubah Status Spesial">
                                        <i class="fa fa-star {{ $menu->is_special ? 'text-yellow' : 'text-muted' }}"></i>
                                    </button>

                                    @if(auth()->user()->isAdmin())
                                        {{-- Edit --}}
                                        <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-default btn-sm" title="Edit Data">
                                            <i class="fa fa-pencil text-info"></i>
                                        </a>

                                        {{-- Delete (Sembunyikan) --}}
                                        <form action="{{ route('admin.menus.deactivate', $menu) }}" method="POST" class="form-delete-menu" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="button" class="btn btn-default btn-sm btn-delete-trigger" title="Nonaktifkan (Sembunyikan)">
                                                <i class="fa fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    @endif
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
        .pagination > .active > a, .pagination > .active > span {
            background-color: #064e3b !important;
            border-color: #064e3b !important;
        }
        .table-hover tbody tr:hover {
            background-color: #f0fdf4 !important;
        }
        .text-yellow { color: #f39c12 !important; }
        #ajax-alert {
            background-color: #064e3b !important;
            border-color: #4ade80;
            color: white;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 300px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        if ($('.alert-floating').is(':visible')) {
            $('.alert-floating').delay(2000).fadeOut();
        }

        function showToast(message) {
            $('#ajax-message').text(message);
            $('#ajax-alert').fadeIn().delay(2000).fadeOut();
        }

        // Toggle Status
        $('.btn-toggle-status').on('click', function() {
            let btn = $(this);
            let url = btn.data('url');
            let menuId = btn.data('id');
            let label = $('#label-status-' + menuId);

            btn.prop('disabled', true);

            $.ajax({
                url: url,
                type: 'PATCH',
                success: function(response) {
                    if (response.new_status) {
                        label.text('Tersedia').css('background-color', '#16a34a');
                    } else {
                        label.text('Habis').css('background-color', '#dc2626');
                    }
                    showToast('Status ketersediaan diperbarui');
                },
                error: function() {
                    alert('Terjadi kesalahan sistem.');
                },
                complete: function() {
                    btn.prop('disabled', false);
                }
            });
        });

        // Toggle Spesial
        $('.btn-toggle-special').on('click', function() {
            let btn = $(this);
            let icon = btn.find('i');
            let url = btn.data('url');

            btn.prop('disabled', true);

            $.ajax({
                url: url,
                type: 'PATCH',
                success: function(response) {
                    if (response.is_special) {
                        $('.btn-toggle-special i').removeClass('text-yellow').addClass('text-muted');
                        icon.addClass('text-yellow').removeClass('text-muted');
                    } else {
                        icon.removeClass('text-yellow').addClass('text-muted');
                    }
                    showToast('Menu spesial diperbarui');
                },
                error: function() {
                    alert('Terjadi kesalahan sistem.');
                },
                complete: function() {
                    btn.prop('disabled', false);
                }
            });
        });
    });
    </script>
@endsection