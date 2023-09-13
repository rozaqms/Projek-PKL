<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('Key', 10)->unique();
            $table->integer('tujuan_penghasilan')->default(0);
            $table->integer('penghasilan')->default(0);
            $table->integer('stok_terjual')->default(0);
            $table->integer('pengeluaran')->default(0);
            $table->integer('penghasilan_bersih')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penjualan');
    }
};
