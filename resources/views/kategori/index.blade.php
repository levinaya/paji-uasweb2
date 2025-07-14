@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<style>
    body {
        background-color: #fff0f5;
        font-family: 'Comic Sans MS', cursive;
        color: #d63384;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background-color: #ffe6f0;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 6px 15px rgba(255, 192, 203, 0.4);
    }

    h2 {
        text-align: center;
        color: #ff69b4;
        margin-bottom: 20px;
    }

    .butterfly {
        text-align: center;
        font-size: 35px;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 20px;
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
        background-color: #ff69b4;
        color: white;
        padding: 10px 15px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 10px;
        display: inline-block;
    }

    .btn:hover {
        background-color: #ff1493;
    }

    .actions form {
        display: inline;
    }
</style>

<div class="container">
    <div class="butterfly">🦋</div>
    <h2>Daftar Kategori</h2>

    <a href="{{ route('kategori.create') }}" class="btn">+ Tambah Kategori</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori}}</td>
                    <td>{{ ucfirst($item->jenis) }}</td>
                    <td class="actions">
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color: #ff4d6d;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada kategori 🥺</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
