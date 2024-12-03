<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Videos;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Videos::create([
            'materials_id' => 10, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Multimedia 1 Video 1',
            'jalur_file' => 'https://youtu.be/2Jhyk88Rr94?si=0s3a4_00KDtx1UCI'
        ]);

        Videos::create([
            'materials_id' => 10, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Multimedia 1 Video 2',
            'jalur_file' => 'https://youtu.be/UVqbR_DgzuU?si=eWemAxpbwtSSQjyF'
        ]);

        Videos::create([
            'materials_id' => 10, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Multimedia 1 Video 3',
            'jalur_file' => 'https://youtu.be/ArxEnWbWp6w?si=TLUm0tglZ5ALIYx3'
        ]);

        Videos::create([
            'materials_id' => 11, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Web 1 Video 1',
            'jalur_file' => 'https://youtu.be/OEhw6GqQDts?si=gcDROlYGpeN6kLHx'
        ]);

        Videos::create([
            'materials_id' => 11, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Web 1 Video 2',
            'jalur_file' => 'https://youtu.be/c_fRtpQf4Oc?si=Tn_ITGVCqI8MQs-O'
        ]);

        Videos::create([
            'materials_id' => 11, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Web 1 Video 3',
            'jalur_file' => 'https://youtu.be/71a2zeC71gk?si=igAiSFF0yrAd58a-'
        ]);

        Videos::create([
            'materials_id' => 12, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'SEO 1 Video 1',
            'jalur_file' => 'https://youtu.be/fr4e257X97I?si=ieyCINjZbI7JQTnh'
        ]);

        Videos::create([
            'materials_id' => 12, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'SEO 1 Video 2',
            'jalur_file' => 'https://youtu.be/UfJHRxUxp4U?si=GdHEsjGm-xcnmgrJ'
        ]);

        Videos::create([
            'materials_id' => 12 , // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'SEO 1 Video 3',
            'jalur_file' => 'https://youtu.be/XBBUHjl99hA?si=V6MM9KzXAwyRNQIt'
        ]);

        Videos::create([
            'materials_id' => 13, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Copywriter 1 Video 1',
            'jalur_file' => 'https://youtu.be/w7drAXsN8xA?si=eTMWggsefz-0nxXF'
        ]);

        Videos::create([
            'materials_id' => 13, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Copywriter 1 Video 2',
            'jalur_file' => 'https://youtu.be/Kwd4qctAzeQ?si=HwFpG_nkT5tgcxyP'
        ]);

        Videos::create([
            'materials_id' => 13, // Pastikan ID ini sesuai dengan ID materials yang ada
            'judul_video' => 'Multimedia 1 Video 3',
            'jalur_file' => 'https://youtu.be/yo4oI6Mt7cY?si=ITNWJayUWjPs8Xup'
        ]);
    }
}
