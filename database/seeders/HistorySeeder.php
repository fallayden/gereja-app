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
                'year' => 2005,
                'title' => 'Pendirian GBIA GRAMMATA',
                'description' => 'Awal mula berdirinya persekutuan jemaat GBIA GRAMMATA di mana ibadah dan persekutuan pertama kali rutin diselenggarakan.',
                'sort_order' => 1,
            ],
            [
                'year' => 2010,
                'title' => 'Penerbitan Pertama Majalah Pedang Roh',
                'description' => 'Edisi pertama majalah dwi-bulanan Pedang Roh diterbitkan sebagai media edifikasi dan pengajaran firman bagi seluruh jemaat.',
                'sort_order' => 2,
            ],
            [
                'year' => 2015,
                'title' => 'Perluasan Tunas Jemaat',
                'description' => 'Mulai merintis dan mendirikan beberapa pos pelayanan tunas jemaat untuk menjangkau jemaat di daerah sekitar.',
                'sort_order' => 3,
            ],
            [
                'year' => 2024,
                'title' => 'Digitalisasi Pelayanan & Portal Resmi',
                'description' => 'Inisiasi pembangunan web portal resmi GBIA GRAMMATA untuk mempermudah akses informasi, warta digital, dan majalah Pedang Roh.',
                'sort_order' => 4,
            ],
        ];

        foreach ($histories as $history) {
            History::create($history);
        }
    }
}
