@extends('layouts.app')

@section('title', 'Data Transaksi')

@section('content')
<style>
    body {
        background-color: #fff0f5;
        font-family: 'Comic Sans MS', cursive;
        color: #d63384;
    }

    .container {
        max-width: 900px;
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

    .butterfly {
        text-align: center;
        font-size: 35px;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #ffc0cb;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #ffb6c1;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #ffe6f0;
    }

    .btn {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 15px;
        background-color: #ff69b4;
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn:hover {
        background-color: #ff1493;
    }

    .form-inline {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .form-inline select,
    .form-inline input[type="text"] {
        padding: 8px;
        border-radius: 8px;
        border: 1px solid #ffc0cb;
        width: 48%;
    }

    .actions a {
        margin: 0 5px;
    }
</style>

<div class="container">
    <div class="butterfly">🦋</div>
    <h2>Daftar Transaksi Levina</h2>

    <a href="{{ route('transaksi.create') }}" class="btn">+ Tambah Transaksi</a>

    {{-- Filter --}}
    <form class="form-inline" method="GET" action="{{ route('transaksi.index') }}">
        <select name="kategori_id">
            <option value="">Semua Kategori</option>
            @foreach ($kategoriList as $kategori)
                <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        <input type="text" name="cari" placeholder="Cari nama barang..." value="{{ request('cari') }}">
        <button type="submit" class="btn">Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ ucfirst($item->kategori->jenis ?? '-') }}</td>
                    <td>{{ $item->nama_barang ?? '-' }}</td>
                    <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td class="actions">
                        <a href="{{ route('transaksi.edit', $item->id) }}" class="btn">Edit</a>
                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn" style="background-color: #ff4d6d;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada data transaksi 🥺</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
