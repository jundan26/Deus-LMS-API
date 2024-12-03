<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('feedback', function (Blueprint $table) {
        $table->id();
        $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade'); 
        $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); 
        $table->enum('relevansi', [
            'tidak',
            'tidak relevan dengan materi',
            'ya masih relevan dengan materi',
            'ya namun agak kurang relevan'
        ]);
        $table->text('saran_kritik')->nullable(false);
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::dropIfExists('feedback');
}
};