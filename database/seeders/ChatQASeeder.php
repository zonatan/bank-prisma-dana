<?php

namespace Database\Seeders;

use App\Models\ChatQA;
use Illuminate\Database\Seeder;

class ChatQASeeder extends Seeder
{
    public function run(): void
    {
        $qa = [
            ['Bagaimana cara membuka rekening?', 'Silakan datang ke kantor cabang terdekat dengan KTP dan NPWP.'],
            ['Berapa bunga tabungan?', 'Bunga tabungan saat ini 3.5% per tahun.'],
            ['Apa syarat pengajuan kredit?', 'KTP, slip gaji 3 bulan terakhir, dan rekening koran.'],
            ['Jam operasional bank?', 'Senin-Jumat: 08.00 - 16.00 WIB, Sabtu: 08.00 - 12.00 WIB.'],
            ['Ada mobile banking?', 'Ya, unduh aplikasi "Prisma Mobile" di Play Store/App Store.'],
        ];

        foreach ($qa as $index => $item) {
            ChatQA::create([
                'question' => $item[0],
                'answer' => $item[1],
                'order' => $index + 1,
                'active' => true
            ]);
        }
    }
}