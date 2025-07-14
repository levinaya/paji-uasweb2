@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<style>
    body {
        background-color: #fff0f5;
        font-family: 'Comic Sans MS', cursive;
        color: #d63384;
    }

    .container {
        max-width: 600px;
        margin: auto;
        background-color: #ffe6f0;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 6px 15px rgba(255, 192, 203, 0.4);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #ff69b4;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ffc0cb;
        border-radius: 10px;
        margin-top: 5px;
    }

    .btn {
        display: inline-block;
        background-color: #ff69b4;
        color: white;
        padding: 10px 15px;
        border-radius: 10px;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #ff1493;
    }
</style>

<div class="container">
    <h2>🦋 Tambah Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }} ({{ ucfirst($k->jenis) }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" required placeholder="Contoh: Anting Magnet">
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" required step="0.01" placeholder="Contoh: 10000">
        </div>

        <div class="form-group">
            <label for="deskripsi">Keterangan / Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" required placeholder="Catatan tambahan..."></textarea>
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
</div>
@endsection
