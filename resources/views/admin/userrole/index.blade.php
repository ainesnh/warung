@extends('layouts.adminlte')

@section('title', 'Manajemen User Role')

@section('content')
    <style>
        .alert-floating {
            position: fixed; top: 20px; right: 20px; z-index: 9999;
            min-width: 250px; max-width: 350px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-left: 5px solid #4ade80 !important;
        }
        .table-hover tbody tr:hover { background-color: #f0fdf4 !important; }
        .modal-header-custom { background-color: #064e3b; color: white; border-radius: 8px 8px 0 0; }
    </style>

    {{-- Alert AJAX --}}
    <div id="ajax-alert" style="display: none;" class="alert alert-success alert-dismissible alert-floating" style="background-color: #064e3b !important; color: white;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: white;">&times;</button>
        <i class="icon fa fa-check"></i> <span id="ajax-message"></span>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible alert-floating" style="background-color: #064e3b !important; color: white;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: white;">&times;</button>
            <i class="icon fa fa-check"></i> {{ session('success') }}
        </div>
    @endif

    <div class="box shadow-sm" style="border-top: 3px solid #064e3b; border-radius: 8px; overflow: hidden;">
        <div class="box-header with-border" style="background-color: #fcfcfc; padding: 15px;">
            <h3 class="box-title" style="font-weight: 700; color: #064e3b;">
                <i class="fa fa-users" style="margin-right: 5px;"></i> Daftar User Role
            </h3>
            <div class="box-tools">
                <button type="button" class="btn btn-flat" onclick="openCreateModal()" style="background-color: #16a34a; color: white; border-radius: 4px;">
                    <i class="fa fa-plus-circle"></i> Tambah Role Baru
                </button>
            </div>
        </div>

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-striped">
                <thead>
                    <tr style="background-color: #064e3b; color: #ffffff;">
                        <th class="text-center" style="width: 80px; padding: 12px;">ID</th>
                        <th style="padding: 12px;">Nama Role</th>
                        <th style="padding: 12px;">Keterangan</th>
                        <th class="text-center" style="width: 150px; padding: 12px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">{{ $role->id }}</td>
                            <td style="vertical-align: middle;">
                                <strong style="color: #064e3b;">{{ $role->nama_role }}</strong>
                            </td>
                            <td style="vertical-align: middle;" class="text-muted">
                                {{ $role->keterangan ?? '-' }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <div class="btn-group">
                                    <button title="Edit Role" class="btn btn-default btn-sm" 
                                        onclick="openEditModal('{{ $role->id }}', '{{ $role->nama_role }}', '{{ $role->keterangan }}')">
                                        <i class="fa fa-pencil text-info"></i>
                                    </button>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" 
                                        method="POST" 
                                        class="form-delete-role" 
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-default btn-sm" title="Hapus">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center" style="padding: 40px; color: #999;">
                                Belum ada data role.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalRole" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 8px;">
                <form id="formRole" action="" method="POST">
                    @csrf
                    <div id="method-container"></div>
                    
                    <div class="modal-header modal-header-custom">
                        <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                        <h4 class="modal-title" id="modalTitle" style="font-weight: 700;">Tambah Role</h4>
                    </div>
                    <div class="modal-body" style="padding: 20px;">
                        <div class="form-group">
                            <label style="color: #4b5563;">Nama Role</label>
                            <input type="text" name="nama_role" id="nama_role" class="form-control" placeholder="Admin/Kasir/Pelayan" required>
                        </div>
                        <div class="form-group">
                            <label style="color: #4b5563;">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Jelaskan wewenang role ini..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #f9fafb; border-radius: 0 0 8px 8px;">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-flat" style="background-color: #16a34a; color: white;">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openCreateModal() {
            $('#modalTitle').text('Tambah Role Baru');
            $('#formRole').attr('action', "{{ route('admin.roles.store') }}");
            $('#method-container').html('');
            $('#formRole')[0].reset();
            $('#modalRole').modal('show');
        }

        function openEditModal(id, nama, keterangan) {
            $('#modalTitle').text('Edit User Role');
            $('#formRole').attr('action', "/admin/roles/" + id);
            $('#method-container').html('@method("PUT")');
            
            $('#nama_role').val(nama);
            $('#keterangan').val(keterangan);
            $('#modalRole').modal('show');
        }

        $(document).ready(function() {
            $('.form-delete-role').on('submit', function(e) {
                e.preventDefault();
                let form = this;

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data role yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626', 
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            @if(session('error_swal'))
                Swal.fire({
                    title: 'Gagal Menghapus!',
                    text: "{{ session('error_swal') }}",
                    icon: 'error',
                    confirmButtonColor: '#064e3b',
                    confirmButtonText: 'Ok'
                });
            @endif
        });
</script>
    </script>
@endsection