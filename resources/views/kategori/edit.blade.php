@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mt-4">
    <h2>Edit Kategori</h2>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label for="nama_kategori">Nama Kategori:</label><br>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
            @error('nama_kategori')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label for="jenis">Jenis:</label><br>
            <select name="jenis" id="jenis" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="pemasukan" {{ old('jenis', $kategori->jenis) == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="pengeluaran" {{ old('jenis', $kategori->jenis) == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
            @error('jenis')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
@endsection
