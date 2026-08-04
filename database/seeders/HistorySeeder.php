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
                'description' => 'Kebaktian perdana GBIA Grammata dimulai di lantai dua sebuah salon di Gading Serpong. GBIA Graphe mengutus Bpk. Timmy sebagai penanggung jawab.',
                'sort_order' => 1,
            ],
            [
                'year' => 2001,
                'title' => 'Pergantian Penanggung Jawab & Pindah Ruko',
                'description' => 'Ev. Firman Legowo ditunjuk untuk menggantikan Bpk. Timmy. Lokasi kebaktian pindah ke ruko blok AD, Gading Serpong.',
                'sort_order' => 2,
            ],
            [
                'year' => 2003,
                'title' => 'Estafet Penggembalaan',
                'description' => 'Penggembalaan dipercayakan kepada Ev. Chi Jun Pin setelah Ev. Firman merintis di tempat lain. Kebaktian sempat berpindah ke ruko milik jemaat (Ibu Lie Ester) di blok AH.',
                'sort_order' => 3,
            ],
            [
                'year' => 2004,
                'title' => 'Awal Pelayanan Sdr. Arifan T. Kusuma',
                'description' => 'Ev. Chi Jun Pin pergi ke Brastagi untuk merintis jemaat. Penggembalaan kemudian dipercayakan kepada Sdr. Arifan T. Kusuma, yang saat itu masih menjadi mahasiswa senior di STT Graphe.',
                'sort_order' => 4,
            ],
            [
                'year' => 2005,
                'title' => 'Penahbisan Penginjil',
                'description' => 'Sdr. Arifan ditahbiskan sebagai penginjil GBIA Graphe untuk melayani tugas penggembalaan di GBIA Grammata. Tempat kebaktian berpindah kembali ke ruko blok AA, Gading Serpong.',
                'sort_order' => 5,
            ],
            [
                'year' => 2012,
                'title' => 'Jemaat Independen & Lokasi Santa Monica',
                'description' => 'Ev. Arifan ditahbiskan menjadi gembala jemaat, dan GBIA Grammata resmi menjadi jemaat yang independen. Tempat kebaktian menetap di Ruko Santa Monica blok A No. 3, yang terus menjadi tempat pertemuan jemaat hingga saat ini.',
                'sort_order' => 6,
            ],
        ];

        foreach ($histories as $history) {
            History::create($history);
        }
    }
}
