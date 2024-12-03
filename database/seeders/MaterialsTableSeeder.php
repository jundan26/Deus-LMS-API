<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materials;

class MaterialsTableSeeder extends Seeder
{
    public function run()
    {
        Materials::create([
            'nama_kelas' => 'Multimedia 1',
            'deskripsi_kelas' => 'Belajar dasar-dasar multimedia',
            'estimasi_selesai' => '30',
            'jumlah_latihan' => '10',
            'rating' => '5.0',
            'kategori' => 'Multimedia',
            'gambar' => 'https://www.talenta.co/wp-content/uploads/2022/10/jurusan-multimedia-bisa-kerja-apa.jpg',
            'pengguna_terdaftar' => '0' 
        ]);

        Materials::create([
            'nama_kelas' => 'Web 1',
            'deskripsi_kelas' => 'Belajar dasar-dasar web',
            'estimasi_selesai' => '200',
            'jumlah_latihan' => '40',
            'rating' => '5.0',
            'kategori' => 'Web',
            'gambar' => 'https://badoystudio.com/wp-content/uploads/2019/07/apa-itu-web-developer.jpg',
            'pengguna_terdaftar' => '0' 
        ]);
        
        Materials::create([
            'nama_kelas' => 'SEO 1',
            'deskripsi_kelas' => 'Belajar dasar-dasar SEO',
            'estimasi_selesai' => '250',
            'jumlah_latihan' => '50',
            'rating' => '5.0',
            'kategori' => 'SEO',
            'gambar' => 'https://cdn-web.ruangguru.com/landing-pages/assets/hs/seo-specialist-adalah.jpg',
            'pengguna_terdaftar' => '0' 
        ]);

        Materials::create([
            'nama_kelas' => 'Copywriter 1',
            'deskripsi_kelas' => 'Belajar dasar-dasar copywriter',
            'estimasi_selesai' => '30',
            'jumlah_latihan' => '10',
            'rating' => '5.0',
            'kategori' => 'Copywriter',
            'gambar' => 'https://www.karier.mu/blog/wp-content/uploads/2022/06/DSC00841-990x500.webp',
            'pengguna_terdaftar' => '0' 
        ]);
    }
}