<div class="box-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum valid.</strong>
            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label for="nama_menu">Nama Menu</label>
        <input type="text" name="nama_menu" id="nama_menu" class="form-control" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    @foreach (['Makanan', 'Minuman', 'Paket'] as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori', $menu->kategori ?: 'Makanan') === $kategori)>{{ $kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $menu->harga) }}" min="0" step="500" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status Ketersediaan</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="tersedia" @selected(old('status', $menu->status ?: 'tersedia') === 'tersedia')>Tersedia</option>
                    <option value="tidak_tersedia" @selected(old('status', $menu->status) === 'tidak_tersedia')>Tidak tersedia</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="gambar">Gambar Menu</label>
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                @if ($menu->gambar)
                    <p class="help-block">Gambar saat ini: {{ $menu->gambar }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    <a href="{{ route('admin.menus.index') }}" class="btn btn-default">Kembali</a>
    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
</div>
