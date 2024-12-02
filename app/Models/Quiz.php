<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {
    protected $table = 'quizzes';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    protected $fillable = [
        'materials_id', 'pertanyaan'];
    
    public function options(){
        return $this->hasMany(QuizOption::class, 'quizzes_id');
    }
        
    }



