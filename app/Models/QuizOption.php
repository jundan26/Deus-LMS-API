<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model {
    protected $table = 'quiz_options';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    protected $fillable = [
        'quizzes_id', 'teks_jawaban', 'jawaban_benar'];
    
    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quizzes_id');
    }

}