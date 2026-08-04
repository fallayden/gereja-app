<?php

namespace Database\Seeders;

use App\Models\Creed;
use Illuminate\Database\Seeder;

class CreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $creeds = [
            [
                'number' => 1,
                'title' => 'Alkitab Adalah Firman Allah',
                'content' => 'Kami percaya bahwa Alkitab terdiri dari Perjanjian Lama dan Perjanjian Baru, diilhamkan oleh Allah secara verbal dan tanpa salah dalam naskah aslinya, serta menjadi otoritas tertinggi dan final untuk iman dan kehidupan Kristen.',
            ],
            [
                'number' => 2,
                'title' => 'Allah Yang Maha Esa dan Tritunggal',
                'content' => 'Kami percaya akan Allah Yang Maha Esa, Pencipta dan Pemelihara alam semesta, yang ada secara kekal dalam tiga Pribadi: Bapa, Anak, dan Roh Kudus.',
            ],
            [
                'number' => 3,
                'title' => 'Tuhan Yesus Kristus',
                'content' => 'Kami percaya bahwa Yesus Kristus adalah Anak Allah yang tunggal, dikandung dari Roh Kudus, lahir dari perawan Maria, hidup tanpa dosa, mati di kayu salib sebagai korban pengganti, bangkit secara fisik, dan naik ke surga.',
            ],
            [
                'number' => 4,
                'title' => 'Roh Kudus',
                'content' => 'Kami percaya akan Roh Kudus yang memeteraikan, membaptis, dan mengindiami setiap orang percaya sejak saat pertobatan, serta memberikan karunia-karunia rohani untuk memperlengkapi jemaat.',
            ],
            [
                'number' => 5,
                'title' => 'Penciptaan Manusia',
                'content' => 'Kami percaya bahwa manusia diciptakan langsung oleh Allah menurut gambar dan rupa Allah sendiri, pria dan wanita.',
            ],
            [
                'number' => 6,
                'title' => 'Kejatuhan Manusia dalam Dosa',
                'content' => 'Kami percaya bahwa melalui ketidaktaatan Adam, seluruh umat manusia telah jatuh ke dalam dosa sehingga kehilangan kemuliaan Allah dan terpisah secara rohani dari Allah.',
            ],
            [
                'number' => 7,
                'title' => 'Keselamatan Hanya Melalui Kristus',
                'content' => 'Kami percaya bahwa keselamatan adalah anugerah Allah semata-mata, diterima melalui iman kepada Yesus Kristus, bukan karena perbuatan atau kebaikan manusia.',
            ],
            [
                'number' => 8,
                'title' => 'Kelahiran Baru (Pembaruan)',
                'content' => 'Kami percaya bahwa setiap orang yang bertobat dan beriman kepada Kristus dilahirkan kembali secara rohani oleh Roh Kudus.',
            ],
            [
                'number' => 9,
                'title' => 'Pembenaran Oleh Iman',
                'content' => 'Kami percaya bahwa orang percaya dibenarkan di hadapan Allah hanya karena kebenaran Kristus yang diperhitungkan kepada mereka melalui iman.',
            ],
            [
                'number' => 10,
                'title' => 'Pengudusan',
                'content' => 'Kami percaya bahwa setiap orang percaya dikuduskan secara posisional saat percaya dan dipanggil untuk mengalami pengudusan secara praktis bertahap dalam kehidupan sehari-hari.',
            ],
            [
                'number' => 11,
                'title' => 'Ketekunan Orang Kerap',
                'content' => 'Kami percaya bahwa mereka yang telah sungguh-sungguh dilahirkan kembali terpelihara oleh kuasa Allah dalam keselamatan mereka secara kekal.',
            ],
            [
                'number' => 12,
                'title' => 'Gereja Lokal dan Universal',
                'content' => 'Kami percaya bahwa Gereja Universal adalah tubuh Kristus yang terdiri dari semua orang percaya, dan Gereja Lokal adalah persekutuan jemaat di suatu tempat untuk beribadah dan melayani.',
            ],
            [
                'number' => 13,
                'title' => 'Sakramen Pembaptisan Air',
                'content' => 'Kami percaya bahwa pembaptisan air dilakukan bagi orang percaya sebagai tanda ketaatan dan kesaksian umum atas persatuan mereka dengan kematian dan kebangkitan Kristus.',
            ],
            [
                'number' => 14,
                'title' => 'Sakramen Perjamuan Kudus',
                'content' => 'Kami percaya bahwa Perjamuan Kudus diresmikan oleh Kristus untuk memperingati kematian-Nya hingga Ia datang kembali.',
            ],
            [
                'number' => 15,
                'title' => 'Hari Tuhan',
                'content' => 'Kami percaya bahwa hari Minggu adalah hari peringatan kebangkitan Kristus dan dipelihara sebagai hari ibadah serta persekutuan jemaat.',
            ],
            [
                'number' => 16,
                'title' => 'Kepemimpinan dan Penatua Gereja',
                'content' => 'Kami percaya bahwa Allah menetapkan kualifikasi dan kepemimpinan penatua serta diaken untuk menggembalakan dan melayani jemaat lokal.',
            ],
            [
                'number' => 17,
                'title' => 'Misi Agung',
                'content' => 'Kami percaya bahwa seluruh jemaat bertugas menyampaikan Injil Kristus kepada seluruh bangsa dan membuat murid.',
            ],
            [
                'number' => 18,
                'title' => 'Persepuluhan dan Persembahan',
                'content' => 'Kami percaya bahwa orang percaya dipanggil untuk memberi persembahan dengan sukacita dan rela hati untuk menopang pelayanan Injil.',
            ],
            [
                'number' => 19,
                'title' => 'Kasih Persaudaraan dan Kesatuan',
                'content' => 'Kami percaya akan pentingnya memelihara kesatuan Roh dalam ikatan damai sejahtera antar sesama orang percaya.',
            ],
            [
                'number' => 20,
                'title' => 'Doa dan Doa Syafaat',
                'content' => 'Kami percaya akan kuasa doa sebagai sarana komunikasi dengan Allah Bapa dalam nama Yesus Kristus.',
            ],
            [
                'number' => 21,
                'title' => 'Keluarga dan Pernikahan Kudus',
                'content' => 'Kami percaya bahwa pernikahan adalah ketetapan Allah antara seorang pria dan seorang wanita secara seumur hidup.',
            ],
            [
                'number' => 22,
                'title' => 'Mendidik Anak dalam Tuhan',
                'content' => 'Kami percaya bahwa orang tua bertanggung jawab mendidik anak-anak mereka dalam pengajaran dan nasihat Tuhan.',
            ],
            [
                'number' => 23,
                'title' => 'Pemerintah dan Otoritas Sipil',
                'content' => 'Kami percaya bahwa pemerintah ditetapkan oleh Allah dan orang percaya dipanggil untuk tunduk serta mendoakan para pemimpin bangsa.',
            ],
            [
                'number' => 24,
                'title' => 'Kehidupan Berkeadilan dan Sosial',
                'content' => 'Kami percaya bahwa orang Kristen dipanggil menjadi terang dan garam, melakukan keadilan dan kasih kepada sesama.',
            ],
            [
                'number' => 25,
                'title' => 'Kebebasan Beragama',
                'content' => 'Kami percaya akan kebebasan hati nurani dan kebebasan setiap orang untuk beribadah sesuai dengan iman kepercayaannya.',
            ],
            [
                'number' => 26,
                'title' => 'Dunia Roh dan Malaikat',
                'content' => 'Kami percaya akan keberadaan malaikat Allah serta keberadaan iblis dan roh-roh jahat yang telah dikalahkan oleh Kristus di kayu salib.',
            ],
            [
                'number' => 27,
                'title' => 'Kedatangan Kristus Kedua Kali',
                'content' => 'Kami percaya akan kedatangan Tuhan Yesus Kristus secara pribadi, mulia, dan tak terduga untuk menjemput gereja-Nya dan menghakimi dunia.',
            ],
            [
                'number' => 28,
                'title' => 'Kebangkitan Orang Mati',
                'content' => 'Kami percaya akan kebangkitan tubuh baik bagi orang benar maupun orang zalim.',
            ],
            [
                'number' => 29,
                'title' => 'Penghakiman Terakhir',
                'content' => 'Kami percaya bahwa semua manusia akan berdiri di hadapan takhta penghakiman Allah.',
            ],
            [
                'number' => 30,
                'title' => 'Kebahagiaan Kekal dan Hukuman Kekal',
                'content' => 'Kami percaya bahwa orang percaya akan masuk ke dalam sukacita kekal bersama Allah, sedangkan orang fasik akan menerima hukuman kekal.',
            ],
            [
                'number' => 31,
                'title' => 'Langit Baru dan Bumi Baru',
                'content' => 'Kami percaya bahwa Allah akan menciptakan langit baru dan bumi baru di mana kebenaran akan diam secara kekal.',
            ],
        ];

        foreach ($creeds as $creed) {
            $creed['sort_order'] = $creed['number'];
            Creed::create($creed);
        }
    }
}
