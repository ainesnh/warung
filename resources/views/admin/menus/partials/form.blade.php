<div class="box-body" style="padding: 20px;">
    {{-- Alert Error yang lebih elegan --}}
    @if ($errors->any())
        <div class="alert alert-dismissible" style="background-color: #fef2f2; border-left: 5px solid #dc2626; color: #991b1b;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4 style="font-size: 16px; font-weight: 700;"><i class="icon fa fa-ban"></i> Ups! Ada kesalahan input:</h4>
            <ul style="padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Nama Menu --}}
    <div class="form-group">
        <label for="nama_menu" style="color: #064e3b;"><i class="fa fa-tag"></i> Nama Menu</label>
        <input type="text" name="nama_menu" id="nama_menu" class="form-control" 
               placeholder="Contoh: Tengkleng Gajah Spesial" 
               style="border-radius: 4px; border: 1px solid #d1d5db;"
               value="{{ old('nama_menu', $menu->nama_menu) }}" required>
    </div>

    <div class="row">
        {{-- Kategori --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="kategori" style="color: #064e3b;"><i class="fa fa-list"></i> Kategori</label>
                <select name="kategori" id="kategori" class="form-control" style="border-radius: 4px;" required>
                    @foreach (['Makanan', 'Minuman', 'Paket'] as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori', $menu->kategori ?: 'Makanan') === $kategori)>{{ $kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Harga --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="harga" style="color: #064e3b;"><i class="fa fa-money"></i> Harga (Rp)</label>
                <div class="input-group">
                    <span class="input-group-addon" style="background-color: #f3f4f6;">Rp</span>
                    <input type="number" name="harga" id="harga" class="form-control" 
                           value="{{ old('harga', $menu->harga) }}" min="0" step="500" required>
                </div>
            </div>
        </div>
    </div>

    {{-- Deskripsi --}}
    <div class="form-group">
        <label for="deskripsi" style="color: #064e3b;"><i class="fa fa-info-circle"></i> Deskripsi Menu</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" 
                  placeholder="Jelaskan kelezatan menu ini..." 
                  style="border-radius: 4px; resize: none;">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
    </div>

    <div class="row">
        {{-- Status --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="status" style="color: #064e3b;"><i class="fa fa-check-square"></i> Status Ketersediaan</label>
                <select name="status" id="status" class="form-control" style="border-radius: 4px;" required>
                    <option value="tersedia" @selected(old('status', $menu->status ?: 'tersedia') === 'tersedia')>Tersedia</option>
                    <option value="tidak_tersedia" @selected(old('status', $menu->status) === 'tidak_tersedia')>Tidak tersedia</option>
                </select>
            </div>
        </div>
        {{-- Upload Gambar --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="gambar" style="color: #064e3b;"><i class="fa fa-camera"></i> Gambar Menu</label>
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" style="border: none; padding: 0;">
                
                @if ($menu->gambar)
                    <div style="margin-top: 10px; padding: 8px; background: #f9fafb; border-radius: 4px; border: 1px dashed #d1d5db;">
                        <small class="text-muted"><i class="fa fa-paperclip"></i> File saat ini: {{ basename($menu->gambar) }}</small>
                    </div>
                @else
                    <p class="help-block small">Format: JPG, PNG, WEBP (Maks. 2MB)</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="box-footer" style="background-color: #f9fafb; padding: 15px 20px;">
    <a href="{{ route('admin.menus.index') }}" class="btn btn-default btn-flat">
        <i class="fa fa-arrow-left"></i> Batal
    </a>
    <button type="submit" class="btn btn-flat pull-right" style="background-color: #16a34a; color: white; padding: 6px 25px; font-weight: 600;">
        <i class="fa fa-save"></i> Simpan Menu
    </button>
</div>

<style>
    /* Fokus input dengan warna hijau khas tema */
    .form-control:focus {
        border-color: #4ade80 !important;
        box-shadow: none !important;
    }
    label {
        font-weight: 600 !important;
        margin-bottom: 8px;
    }
</style>