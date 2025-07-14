@extends('layouts.app')

@section('title', 'Data Anggaran')

@section('content')
<style>
    body {
        background-color: #ffe6f0;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        color: #d63384;
    }
    .container {
        max-width: 800px;
        margin: auto;
        background: #fff0f5;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(255, 192, 203, 0.4);
    }
    h1 {
        text-align: center;
        color: #ff69b4;
    }
    .butterfly {
        display: block;
        text-align: center;
        font-size: 40px;
    }
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid pink;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #ffc0cb;
        color: white;
    }
</style>

<div class="container">
    <div class="butterfly">🦋🩷🦋</div>
    <h1>Data Anggaran</h1>

    <p>Total Pemasukan: <strong>Rp {{ number_format($pemasukan, 0, ',', '.') }}</strong></p>
    <p>Total Pengeluaran: <strong>Rp {{ number_format($pengeluaran, 0, ',', '.') }}</strong></p>
    <p>Saldo Akhir: <strong>Rp {{ number_format($saldo, 0, ',', '.') }}</strong></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Kategori</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ ucfirst($item->kategori->jenis ?? '-') }}</td>
                <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                <td>{{ $item->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
