<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->string('gambar')->default(0); 
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
           Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn('gambar'); 
        });
    }
};
