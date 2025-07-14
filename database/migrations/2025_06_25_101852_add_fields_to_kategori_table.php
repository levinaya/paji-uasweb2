<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Tambahkan kolom ke tabel kategori
     */
    public function up(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            if (!Schema::hasColumn('kategori', 'nama_kategori')) {
                $table->string('nama_kategori')->after('id')->nullable();
            }

            if (!Schema::hasColumn('kategori', 'jenis')) {
                $table->enum('jenis', ['pemasukan', 'pengeluaran'])->after('nama_kategori')->nullable();
            }
        });
    }

    /**
     * Hapus kolom saat rollback
     */
    public function down(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            if (Schema::hasColumn('kategori', 'nama_kategori')) {
                $table->dropColumn('nama_kategori');
            }

            if (Schema::hasColumn('kategori', 'jenis')) {
                $table->dropColumn('jenis');
            }
        });
    }
};
