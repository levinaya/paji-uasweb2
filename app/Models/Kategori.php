<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'kategori';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_kategori',
        'jenis',
    ];

    /**
     * Relasi ke Transaksi.
     * Satu kategori bisa memiliki banyak transaksi.
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'kategori_id', 'id');
    }
}
