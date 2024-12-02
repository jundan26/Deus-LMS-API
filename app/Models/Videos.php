<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model 
    {
        protected $table = 'videos';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'materials_id', 'judul_video', 'jalur_file'];
    }