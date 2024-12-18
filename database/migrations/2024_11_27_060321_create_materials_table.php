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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->text('deskripsi_kelas');
            $table->integer('estimasi_selesai');
            $table->integer('jumlah_latihan');
            $table->float('rating');
            $table->integer('pengguna_terdaftar');
            $table->string('kategori');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
