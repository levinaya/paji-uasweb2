<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class AnggaranController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi lengkap dengan relasi kategori
        $transaksi = Transaksi::with('kategori')->get();

        // Hitung total pemasukan
        $pemasukan = $transaksi->where('kategori.jenis', 'pemasukan')->sum('jumlah');

        // Hitung total pengeluaran
        $pengeluaran = $transaksi->where('kategori.jenis', 'pengeluaran')->sum('jumlah');

        // Hitung saldo akhir
        $saldo = $pemasukan - $pengeluaran;

        return view('anggaran.index', compact('transaksi', 'pemasukan', 'pengeluaran', 'saldo'));
    }
}
