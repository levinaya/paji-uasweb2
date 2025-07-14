@extends('layouts.app')

@section('title', 'Edit Transaksi')

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
        padding: 25px;
        box-shadow: 0 6px 15px rgba(255, 192, 203, 0.5);
    }

    h2 {
        text-align: center;
        color: #ff69b4;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        color: #d63384;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ffc0cb;
        border-radius: 10px;
        background-color: #fff0f5;
        margin-top: 5px;
        color: #d63384;
    }

    .btn {
        background-color: #ff69b4;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        margin-top: 10px;
    }

    .btn:hover {
        background-color: #ff1493;
    }

    .back-link {
        display: inline-block;
        margin-top: 10px;
        text-decoration: none;
        color: #d63384;
        font-weight: bold;
    }

    .error {
        background-color: #ffe0e9;
        border: 1px solid #ffb6c1;
        color: #d63384;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 15px;
    }
</style>

<div class="container">
    <h2>🦋 Edit Transaksi</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" required>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $transaksi->kategori_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }} ({{ ucfirst($k->jenis) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ $transaksi->nama_barang }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ $transaksi->tanggal }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ $transaksi->jumlah }}" required step="0.01">
        </div>

        <div class="form-group">
            <label for="deskripsi">Keterangan / Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" required>{{ $transaksi->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn">💾 Simpan Perubahan</button>
        <a href="{{ route('transaksi.index') }}" class="back-link">⬅ Kembali ke Daftar</a>
    </form>
</div>
@endsection
