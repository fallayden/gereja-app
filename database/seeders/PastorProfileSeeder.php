<?php

namespace Database\Seeders;

use App\Models\PastorProfile;
use Illuminate\Database\Seeder;

class PastorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PastorProfile::create([
            'name' => 'Pdt. Dr. Abraham Sutanto, M.Th.',
            'title' => 'Gembala Sidang GBIA GRAMMATA',
            'greeting' => 'Salam sejahtera dalam kasih Tuhan kita Yesus Kristus. Selamat datang di portal resmi GBIA GRAMMATA. Kami merindukan setiap jemaat dan pengunjung yang hadir dapat mengalami persekutuan yang hangat, pertumbuhan iman yang berakar pada Firman Tuhan, serta menjadi berkat di mana pun Tuhan menempatkan kita.',
            'photo' => null,
            'is_active' => true,
        ]);
    }
}
