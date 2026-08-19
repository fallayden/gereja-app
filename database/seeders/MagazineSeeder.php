<?php

namespace Database\Seeders;

use App\Models\Magazine;
use Illuminate\Database\Seeder;

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $magazines = [
            [
                'title' => 'Yerusalem Sorgawi & Mitos Yesus',
                'edition_number' => '140',
                'publish_date' => '2026-07-01',
                'cover_image' => null,
                'pdf_file' => 'pedang-roh/Pedang_Roh_Edisi_140.pdf',
                'description' => 'Membahas takhta Allah di Yerusalem Baru dan bantahan apologetika terhadap teori mitos Yesus.',
            ],
            [
                'title' => 'Otoritas Alkitab & Historisitas Yesus',
                'edition_number' => '141',
                'publish_date' => '2026-07-08',
                'cover_image' => null,
                'pdf_file' => 'pedang-roh/Pedang_Roh_Edisi_141.pdf',
                'description' => 'Pembahasan bukti sejarah penulisan Perjanjian Baru dan kesaksian Bapa-Bapa Gereja.',
            ],
            [
                'title' => 'Pengangkatan Orang Percaya & Armagedon',
                'edition_number' => '142',
                'publish_date' => '2026-07-15',
                'cover_image' => null,
                'pdf_file' => 'pedang-roh/Pedang_Roh_Edisi_142.pdf',
                'description' => 'Penjelasan eskatologi pretribulasi dan nubuat nabi Zakharia mengenai kota Yerusalem.',
            ],
            [
                'title' => 'Kebenaran Alkitabiah di Era Modern',
                'edition_number' => '143',
                'publish_date' => '2026-07-22',
                'cover_image' => null,
                'pdf_file' => 'pedang-roh/Pedang_Roh_Edisi_143.pdf',
                'description' => 'Panduan hidup Kristiani di tengah tantangan isu kekristenan masa kini dan biologi sintetis.',
            ],
        ];

        foreach ($magazines as $magazine) {
            Magazine::create($magazine);
        }
    }
}
