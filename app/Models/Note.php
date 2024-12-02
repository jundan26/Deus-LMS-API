<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model {
    protected $table = 'notes';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    protected $fillable = [
        'materials_id', 'users_id', 'konten'];
    
    public function material(){
        return $this->belongsTo(Materials::class);
    }
}