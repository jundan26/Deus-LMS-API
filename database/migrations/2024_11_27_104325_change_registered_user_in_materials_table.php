<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->integer('pengguna_terdaftar')->default(0)->change(); // Mengubah kolom dengan default 0
        });
    }

    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            // Anda bisa mengubah kembali ke tipe sebelumnya jika perlu
            $table->integer('pengguna_terdaftar')->nullable()->change(); // Contoh mengubah menjadi nullable
        });
    }
};