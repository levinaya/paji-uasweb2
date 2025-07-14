<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}" required placeholder="Contoh: Boba, Skincare, dll">
    </div>

    <div class="form-group">
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis" required>
            <option value="" disabled {{ old('jenis') ? '' : 'selected' }}>-- Pilih Jenis --</option>
            <option value="pemasukan" {{ old('jenis') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value="pengeluaran" {{ old('jenis') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
        </select>
    </div>

    <button type="submit" class="btn">🌸 Simpan</button>
    <a href="{{ route('kategori.index') }}" class="back-link">⬅ Kembali</a>
</form>
