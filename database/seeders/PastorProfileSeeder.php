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
            'name' => 'Gbl. Arifan T. Kusuma',
            'title' => 'Gembala Jemaat GBIA GRAMMATA',
            'greeting' => implode("\n\n", [
                'Saya, Gbl. Arifan T. Kusuma, beserta istri, Aslina Warasi, ingin menyampaikan sambutan hangat kepada Anda. Terima kasih telah mengunjungi situs web GBIA Grammata. Kami dengan senang hati menyambut Anda untuk menghadiri kebaktian kami dan melayani Tuhan bersama-sama.',
                'Jika Anda mencari gereja untuk melakukan pekerjaan Tuhan dengan cara Tuhan, inilah tempatnya. Silakan amati dan dengarkan hal-hal yang kami lakukan dan ajarkan dalam Gereja ini. Jangan terburu-buru menolak dan juga jangan terburu-buru menerima. Gereja kami adalah pelayanan yang berpusat pada Kristus dan berorientasi pada keluarga. Kami ingin Anda merasa betah selama kunjungan Anda.',
                'Kami doakan kiranya puji-pujian, persekutuan, dan pemberitaan Firman Tuhan dapat menjadi berkat rohani dalam kehidupan Anda. Jika Anda berdomisili di wilayah Serpong, Tangerang, dan sekitarnya, kami menyampaikan undangan yang tulus untuk menjadikan GBIA Grammata sebagai tempat Anda untuk bertumbuh dan melayani.',
            ]),
            'photo' => null,
            'is_active' => true,
        ]);
    }
}
