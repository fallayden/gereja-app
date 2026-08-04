<?php

namespace Database\Seeders;

use App\Models\BranchChurch;
use Illuminate\Database\Seeder;

class BranchChurchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'GBIA Tanjung Burung',
                'pastor_name' => 'Ev. Akonius',
                'photo' => null,
                'address' => 'Tanjung Burung, Kab. Tangerang',
                'sort_order' => 1,
            ],
            [
                'name' => 'GBIA Musafir, Sepatan',
                'pastor_name' => 'Ev. Servantius Lase',
                'photo' => null,
                'address' => 'Sepatan, Kab. Tangerang',
                'sort_order' => 2,
            ],
            [
                'name' => 'GBIA Citra Raya',
                'pastor_name' => 'G.I. Oka Bagas',
                'photo' => null,
                'address' => 'Citra Raya, Cikupa, Tangerang',
                'sort_order' => 3,
            ],
        ];

        foreach ($branches as $branch) {
            BranchChurch::create($branch);
        }
    }
}
