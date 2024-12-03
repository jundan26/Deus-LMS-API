<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\QuizOption;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pertanyaan tentang Multimedia
        $quiz1 = Quiz::create([
            'materials_id' => 10, // Ganti dengan ID material yang sesuai
            'pertanyaan' => 'Apa yang dimaksud dengan multimedia?',
        ]);
        $quiz1->options()->createMany([
            [
                'teks_jawaban' => 'Penggunaan berbagai media seperti teks, gambar, suara, video, dan animasi',
                'jawaban_benar' => true,
            ],
            [
                'teks_jawaban' => 'Bahasa Pemrograman',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Sebuah Database',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Sebuah Framework',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Sebuah Server',
                'jawaban_benar' => false,
            ],
        ]);

        $quiz2 = Quiz::create([
            'materials_id' => 10,
            'pertanyaan' => 'Media apa saja yang termasuk dalam multimedia?',
        ]);
        $quiz2->options()->createMany([
            [
                'teks_jawaban' => 'Teks, gambar, video, suara, dan animasi',
                'jawaban_benar' => true,
            ],
            [
                'teks_jawaban' => 'HTML dan CSS',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Sistem Operasi',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Bahasa Pemrograman',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Hanya gambar dan video',
                'jawaban_benar' => false,
            ],
        ]);

        // Pertanyaan tentang Web
        $quiz3 = Quiz::create([
            'materials_id' => 11,
            'pertanyaan' => 'Apa itu web?',
        ]);
        $quiz3->options()->createMany([
            [
                'teks_jawaban' => 'Sebuah platform yang menyediakan informasi melalui internet',
                'jawaban_benar' => true,
            ],
            [
                'teks_jawaban' => 'Aplikasi desktop',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Bahasa pemrograman',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Sistem operasi',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Database server',
                'jawaban_benar' => false,
            ],
        ]);

        $quiz4 = Quiz::create([
            'materials_id' => 11,
            'pertanyaan' => 'Apa yang digunakan untuk membuat tampilan web?',
        ]);
        $quiz4->options()->createMany([
            [
                'teks_jawaban' => 'HTML dan CSS',
                'jawaban_benar' => true,
            ],
            [
                'teks_jawaban' => 'Python',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'MySQL',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Java',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Linux',
                'jawaban_benar' => false,
            ],
        ]);

        // Pertanyaan tentang SEO
        $quiz5 = Quiz::create([
            'materials_id' => 12,
            'pertanyaan' => 'Apa tujuan utama dari SEO?',
        ]);
        $quiz5->options()->createMany([
            [
                'teks_jawaban' => 'Meningkatkan visibilitas website di mesin pencari',
                'jawaban_benar' => true,
            ],
            [
                'teks_jawaban' => 'Membuat website terlihat lebih menarik',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Mengamankan website dari serangan',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Membuat server lebih cepat',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Menambah kapasitas penyimpanan',
                'jawaban_benar' => false,
            ],
        ]);

        // Pertanyaan tentang Copywriting
        $quiz6 = Quiz::create([
            'materials_id' => 13,
            'pertanyaan' => 'Apa tujuan utama copywriting?',
        ]);
        $quiz6->options()->createMany([
            [
                'teks_jawaban' => 'Membujuk audiens untuk melakukan tindakan tertentu',
                'jawaban_benar' => true,
            ],
            [
                'teks_jawaban' => 'Meningkatkan keamanan website',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Mengubah bahasa pemrograman',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Membuat konten video',
                'jawaban_benar' => false,
            ],
            [
                'teks_jawaban' => 'Menulis cerita pendek',
                'jawaban_benar' => false,
            ],
        ]);
    }
}