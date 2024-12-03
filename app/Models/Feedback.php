<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'Feedback';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_id', 'users_id', 'relevansi', 'saran_kritik'
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function user(){
        return $this->belongTo(User::class, 'users_id');
    }
} ;