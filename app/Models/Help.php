<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = 'Help';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'no_hp',
        'course_name',
        'deskripsi_masalah',
        'users_id'
    ];

    public function User(){
        return $this->belongTo(User::class, 'users_id');
    }
} ;