<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('kategori'); // relasi ke kategori

        // Filter kategori
        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // Filter nama barang / deskripsi
        if ($request->cari) {
            $query->where(function($q) use ($request) {
                $q->where('nama_barang', 'like', '%' . $request->cari . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->cari . '%');
            });
        }

        $transaksi = $query->latest()->get();
        $kategoriList = Kategori::all();

        return view('transaksi.index', compact('transaksi', 'kategoriList'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('transaksi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_barang' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
        ]);

        Transaksi::create([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->nama_barang,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $kategori = Kategori::all();

        return view('transaksi.edit', compact('transaksi', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_barang' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->nama_barang,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
