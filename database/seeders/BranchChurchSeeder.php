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
                'name' => 'Tunas Jemaat Pos I',
                'pastor_name' => 'Pdt. Timotius',
                'photo' => null,
                'address' => 'Jl. Pos Pelayanan No. 1, Sektor Utara',
                'sort_order' => 1,
            ],
            [
                'name' => 'Tunas Jemaat Pos II',
                'pastor_name' => 'Pdt. Markus',
                'photo' => null,
                'address' => 'Jl. Kebangkitan No. 12, Sektor Selatan',
                'sort_order' => 2,
            ],
            [
                'name' => 'Tunas Jemaat Pos III',
                'pastor_name' => 'Ev. Yohanes',
                'photo' => null,
                'address' => 'Jl. Kasih Gembala No. 45, Sektor Timur',
                'sort_order' => 3,
            ],
        ];

        foreach ($branches as $branch) {
            BranchChurch::create($branch);
        }
    }
}
