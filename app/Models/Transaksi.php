<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'transaksi';

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'tanggal',
        'jumlah',
        'deskripsi',
    ];

    /**
     * Relasi ke kategori.
     * Setiap transaksi dimiliki oleh satu kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
