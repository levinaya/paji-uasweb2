<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            $table->string('nama_kategori')->nullable()->after('id');
            $table->enum('jenis', ['pemasukan', 'pengeluaran'])->nullable()->after('nama_kategori');
        });
    }

    public function down(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            $table->dropColumn('nama_kategori');
            $table->dropColumn('jenis');
        });
    }
};
