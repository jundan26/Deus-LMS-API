<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $table = 'materials';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kelas', 'deskripsi_kelas','estimasi_selesai','jumlah_latihan', 'rating', 'pengguna_terdaftar', 'kategori', 'gambar'
    ];

    public function users (){
        return $this->belongsToMany(User::class, 'material_user', 'materials_id', 'users_id');
    }

} ;