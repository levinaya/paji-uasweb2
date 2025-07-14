<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    /**
     * Tambah kolom nama_barang ke tabel transaksi
     */
    public function up(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('nama_barang')->after('kategori_id')->nullable();
        });
    }

    /**
     * Rollback kolom nama_barang dari tabel transaksi
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('nama_barang');
        });
    }
};
