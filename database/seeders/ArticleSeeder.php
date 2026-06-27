<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article; // Wajib ada ini agar bisa memanggil model

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'title' => 'Peneliti CSIS Usul MBG Dipangkas Jadi 3-4 Hari Sepekan',
            'content' => 'Peneliti CSIS memberikan usulan terkait efisiensi program Makan Bergizi Gratis agar lebih tepat sasaran bagi masyarakat.',
            'published_at' => '2026-04-30',
        ]);

        Article::create([
            'title' => 'MBG Dipangkas Jadi 5 Hari Seminggu, APBN Bisa Hemat Rp50 T Setahun',
            'content' => 'Analisis terbaru dari CNBC Indonesia menunjukkan penghematan signifikan APBN jika frekuensi MBG diatur ulang menjadi 5 hari seminggu.',
            'published_at' => '2026-04-29',
        ]);
    }
}