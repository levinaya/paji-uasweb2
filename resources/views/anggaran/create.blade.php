@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div>
            <label>Kategori:</label>
            <select name="kategori_id" required>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }} - {{ ucfirst($item->jenis) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>
        </div>

        <div>
            <label>Jumlah:</label>
            <input type="number" name="jumlah" required>
        </div>

        <div>
            <label>Keterangan:</label>
            <input type="text" name="deskripsi" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
