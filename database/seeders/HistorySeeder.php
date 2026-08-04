<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $histories = [
            [
                'year' => 2000,
                'title' => 'Kebaktian Perdana',
                'description' => 'Kebaktian perdana di lantai dua salon di Gading Serpong. GBIA Graphe mengutus Bpk. Timmy.',
                'sort_order' => 1,
            ],
            [
                'year' => 2001,
                'title' => 'Ev. Firman Legowo',
                'description' => 'Menggantikan Bpk. Timmy. Pindah ke ruko blok AD, Gading Serpong.',
                'sort_order' => 2,
            ],
            [
                'year' => 2003,
                'title' => 'Ev. Chi Jun Pin',
                'description' => 'Menggantikan Ev. Firman. Kebaktian sempat pindah ke ruko milik jemaat (Ibu Lie Ester) blok AH.',
                'sort_order' => 3,
            ],
            [
                'year' => 2004,
                'title' => 'Sdr. Arifan T. Kusuma',
                'description' => 'Ev. Chi Jun Pin merintis ke Brastagi. Penggembalaan dipercayakan ke Sdr. Arifan (mahasiswa senior STT Graphe).',
                'sort_order' => 4,
            ],
            [
                'year' => 2005,
                'title' => 'Tahbisan sebagai Penginjil',
                'description' => 'Sdr. Arifan ditahbiskan sebagai penginjil GBIA Graphe. Tempat kebaktian pindah ke ruko blok AA.',
                'sort_order' => 5,
            ],
            [
                'year' => 2012,
                'title' => 'GBIA GRAMMATA Independen',
                'description' => 'Ev. Arifan ditahbiskan menjadi gembala jemaat. Lokasi menetap di Ruko Santa Monica blok A No. 3 hingga sekarang.',
                'sort_order' => 6,
            ],
        ];

        foreach ($histories as $history) {
            History::create($history);
        }
    }
}
