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
                'title' => 'Percaya bahwa Allah adalah pencipta langit dan bumi...',
                'content' => 'Percaya bahwa Allah adalah pencipta langit dan bumi beserta seluruh isinya dalam enam hari yang literal (Kej.1&2).',
            ],
            [
                'title' => 'Percaya bahwa Allah adalah esa, dan sejak kekekalan eksis dalam tiga pribadi...',
                'content' => 'Percaya bahwa Allah adalah esa, dan sejak kekekalan eksis dalam tiga pribadi, yaitu Bapa, Putra, dan Roh Kudus (Mat. 28:19). Ketiga pribadi dalam Allah yang esa ini adalah setara, dan consubtantial; tiap-tiap Pribadi adalah sama ilahinya dengan kedua Pribadi yang lain (I Yoh. 5:7)',
            ],
            [
                'title' => 'Percaya bahwa Yesus Kristus telah eksis sejak kekekalan...',
                'content' => 'Percaya bahwa Yesus Kristus telah eksis sejak kekekalan bersama dengan Bapa dan Roh Kudus (Yoh. 1:1-9), dan dalam waktu menjadi daging (inkarnasi; 1 Tim. 3:16), dilahirkan oleh Maria yang masih perawan pada waktu itu (Yes. 7:14), dan adalah Allah sejati sekaligus manusia sejati dalam arti yang sepenuhnya.',
            ],
            [
                'title' => 'Percaya bahwa Roh Kudus adalah Pribadi Allah yang menyadarkan dunia...',
                'content' => 'Percaya bahwa Roh Kudus adalah Pribadi Allah, yang menyadarkan dunia akan dosa, kebenaran, dan penghakiman (Yoh. 14:16-17, 26; 16:7-15). Roh Kudus melahirbarukan orang berdosa yang percaya (Yoh. 3:5-17), melalui Firman Allah, dan Ia mendiami orang percaya (Ef. 1:13). Roh Kudus mengajar, menerangi, memberikan kuasa hidup Kristiani, dan menguduskan karakter orang percaya, sehingga orang percaya perlu untuk penuh dengan Roh Kudus (Ef. 5:17), yang berarti menuruti dan dikendalikan Roh Kudus.',
            ],
            [
                'title' => 'Percaya bahwa manusia telah jatuh ke dalam dosa...',
                'content' => 'Percaya bahwa manusia telah jatuh ke dalam dosa dan telah kehilangan kemuliaan Allah, serta semua manusia mewarisi sifat dosa, dan menempati posisi orang berdosa (Rom. 3:10,23).',
            ],
            [
                'title' => 'Percaya bahwa hanya ada satu cara untuk membereskan dosa...',
                'content' => 'Percaya bahwa hanya ada satu cara untuk membereskan dosa yaitu dengan penghukuman. Dosa tidak dapat dihapus dengan perbuatan baik, rituil ibadah dan berbagai kerajinan keagamaan (Rom. 6:23; Yes. 64:6).',
            ],
            [
                'title' => 'Percaya bahwa Yesus Kristus diutus untuk menanggung dosa semua manusia...',
                'content' => 'Percaya bahwa Yesus Kristus diutus untuk menanggung dosa semua manusia. Dosa manusia yang belum memiliki kesadaran diri (bayi), bahkan dosa Adam hingga dosa manusia terakhir telah ditanggung oleh Tuhan Yesus di kayu salib (Yoh. 1:29, I Yoh. 2:2).',
            ],
            [
                'title' => 'Percaya bahwa manusia diserukan untuk bertobat dan menerima Yesus...',
                'content' => 'Percaya bahwa manusia yang telah memiliki kesadaran diri dan melakukan dosa atas kesadaran diri diserukan untuk bertobat dan menerima Yesus Kristus sebagai Juruselamat untuk mendapatkan pengampunan dosa atau pengaplikasian anugerah keselamatan (Mat. 4:17, Yoh. 3:16, Ef.1:7, Kol. 1:14).',
            ],
            [
                'title' => 'Percaya bahwa tidak ada jalan keselamatan lain selain injil Yesus Kristus...',
                'content' => 'Percaya bahwa tidak ada jalan keselamatan lain selain injil Yesus Kristus karena siapapun yang berada di luar Kristus akan menanggung hukuman atas dosa dirinya. Tidak ada satu manusia pun bisa masuk Surga tanpa percaya kepada Kristus dari Adam hingga manusia terakhir (Yoh.14:6, Ibr.8:6, I Tim. 2:5).',
            ],
            [
                'title' => 'Percaya bahwa Injil yang murni adalah Injil yang tidak ditambahkan...',
                'content' => 'Percaya bahwa Injil yang murni adalah Injil yang tidak ditambahkan dengan percaya kepada Maria, upacara baptisan, kerajinan ibadah dan apa saja (Gal. 1:8, 5:3-4). Dan tidak menekankan kesuksesan duniawi atau yang mengurangi aspek seruan bertobat (I Kor. 15:19).',
            ],
            [
                'title' => 'Percaya bahwa orang yang telah diselamatkan tidak akan kehilangan keselamatannya...',
                'content' => 'Percaya bahwa orang yang telah diselamatkan tidak akan kehilangan keselamatannya karena terjatuh ke dalam dosa. Tetapi yang bersangkutan harus tetap tinggal di dalam kasih karunia Yesus Kristus (Rom. 11:22, I Kor. 15:2, II Kor. 6:1, II Tim. 2:12, Yak. 5:19, I Yoh. 2:24,27, II Yoh.9).',
            ],
            [
                'title' => 'Percaya bahwa ada Surga bagi orang yang bertobat...',
                'content' => 'Percaya bahwa ada Surga bagi orang yang bertobat serta menerima Kristus sebagai Juruselamatnya (Ef. 2:6), dan ada Neraka bagi orang yang menolak anugerah Allah (Yes. 66:24; Wah. 20:11-15).',
            ],
            [
                'title' => 'Percaya bahwa Alkitab adalah satu-satunya firman Allah yang tidak ada salah...',
                'content' => 'Percaya bahwa Alkitab, Kejadian 1:1 sampai Wahyu 22:21, adalah satu-satunya firman Allah yang tidak ada salah (Ams. 30:5). Di luar Alkitab tidak ada firman Allah baik tertulis maupun lisan, dan Alkitab cukup untuk keperluan orang percaya hari ini (II Tim. 3:15-17)',
            ],
            [
                'title' => 'Percaya bahwa Alkitab bersifat kanon tertutup...',
                'content' => 'Percaya bahwa Alkitab bersifat kanon tertutup. Kitab Wahyu 22:21 adalah firman Allah yang terakhir. Sesudah Wahyu 22:21 ditulis, maka Allah telah menghentikan proses pewahyuan dan juga menghentikan semua karunia yang berhubungan dengan pewahyuan (I Kor. 13:8-10).',
            ],
            [
                'title' => 'Percaya bahwa penafsiran Alkitab yang benar adalah Literal Grammatical...',
                'content' => 'Percaya bahwa penafsiran Alkitab yang benar adalah Literal Grammatical. Ini tidak berarti bahwa di dalam Alkitab tidak ada alegori. Alegori di dalam Alkitab memang ada, dan akan ditafsirkan sebagai alegori. Alegori dalam Alkitab dapat dikenal dari konteks, dan juga aturan bahasa yang lazim berlaku.',
            ],
            [
                'title' => 'Percaya bahwa setiap orang percaya harus menggabungkan diri ke dalam Jemaat Lokal...',
                'content' => 'Percaya bahwa setiap orang percaya harus menggabungkan diri ke dalam salah satu Jemaat Lokal untuk membentuk tubuh Kristus serta bertumbuh di dalam Kristus (Ef. 4:11-16).',
            ],
            [
                'title' => 'Percaya bahwa harus ada pemisahan antara Gereja dan Negara...',
                'content' => 'Percaya bahwa harus ada pemisahan antara Gereja dan Negara. Negara tidak berhak untuk mengatur apa yang dipercayai oleh gereja-gereja, dan gereja-gereja tidak boleh memakai kekuasaan pemerintah untuk menyebarkan pemahamannya (Mat. 22:21).',
            ],
            [
                'title' => 'Percaya bahwa Gereja yang benar adalah Gereja yang bersifat Lokal...',
                'content' => 'Percaya bahwa Gereja yang benar adalah Gereja yang bersifat Lokal bukan yang bersifat Universal/Katolik/Am (Ef. 1:1), dan otonomi penuh, tidak tunduk kepada kuasa apapun bahkan kuasa alam maut (Mat. 16:18).',
            ],
            [
                'title' => 'Percaya bahwa tubuh Tuhan Yesus itu bukan seluruh kekristenan...',
                'content' => 'Percaya bahwa tubuh Tuhan Yesus itu bukan seluruh kekristenan, melainkan tiap-tiap Gereja Lokal (Ef. 1:23; I Kor. 12:27).',
            ],
            [
                'title' => 'Percaya bahwa hubungan satu Gereja Lokal dengan Gereja Lokal lain...',
                'content' => 'Percaya bahwa hubungan satu Gereja Lokal dengan Gereja Lokal lain bukan sebagai atasan dan bawahan (vertikal) melainkan sebagai sahabat dan saudara (horisontal) (Wahyu 2-3; Kol. 4:15-16).',
            ],
            [
                'title' => 'Percaya bahwa Tuhan hanya mendirikan Gereja Lokal...',
                'content' => 'Percaya bahwa Tuhan hanya mendirikan Gereja Lokal dan Gereja Lokallah yang mendirikan Yayasan, Sekolah dan berbagai sarana pemberitaan injil. Parachurch yang alkitabiah adalah yang tunduk kepada Gereja Lokal (Mat. 16:18).',
            ],
            [
                'title' => 'Percaya bahwa jabatan Nabi dan Rasul telah dihentikan...',
                'content' => 'Percaya bahwa jabatan Nabi dan Rasul telah dihentikan sejak wahyu terakhir diberikan dan kini tinggal jabatan Penginjil, Gembala dan Guru sebagai jabatan pengajar firman (Ef. 4:11) dan Diaken sebagai jabatan pelayan jemaat (Kis. 6:1-dst).',
            ],
            [
                'title' => 'Percaya bahwa wanita tidak dipanggil untuk mengajar dan memimpin laki-laki dewasa...',
                'content' => 'Percaya bahwa wanita tidak dipanggil untuk mengajar dan memimpin laki-laki dewasa dalam jemaat (I Tim. 2:12-13, I Kor. 14:34), sebagaimana istri harus tunduk kepada suami dan suami harus mengasihi istri (Ef. 5:22-27).',
            ],
            [
                'title' => 'Percaya bahwa baptisan tidak menyelamatkan melainkan salah satu upacara...',
                'content' => 'Percaya bahwa baptisan tidak menyelamatkan melainkan salah satu upacara yang diperintahkan untuk dilaksanakan oleh Gereja Lokal. Dan baptisan yang benar adalah baptisan yang dilakukan terhadap orang yang sudah lahir baru (orang banar), dimasukkan ke dalam air (cara yang benar) dan oleh gereja yang benar (doktrinnya benar) (Mrk. 16:16, Mat. 28:19, Rom. 6:3-4).',
            ],
            [
                'title' => 'Percaya bahwa hanya ada dua upacara yang diperintahkan...',
                'content' => 'Percaya bahwa hanya ada dua upacara yang diperintahkan untuk dilaksanakan oleh Gereja Lokal, yaitu upacara baptisan dan upacara perjamuan Tuhan. Kedua-duanya tidak esensial untuk keselamatan melainkan hanya untuk mengingat akan kematian dan kebangkitan Tuhan Yesus yang menyelamatkan (Mat. 3:11, 28:19, I Kor. 11:24-25).',
            ],
            [
                'title' => 'Percaya bahwa ibadah yang bersifat lahiriah telah digantikan dengan ibadah dalam roh...',
                'content' => 'Percaya bahwa ibadah yang bersifat lahiriah dengan berbagai rituilnya telah digantikan dengan ibadah dalam roh dan kebenaran. Tidak ada simbol lahiriah dalam ibadah selain keteraturan dan kesopanan (Yoh. 4:23-24, I Kor. 14:40).',
            ],
            [
                'title' => 'Percaya bahwa segala lagu pujian dalam gereja haruslah berkenan kepada Allah...',
                'content' => 'Percaya bahwa segala lagu pujian dalam gereja haruslah memenuhi kriteria berkenan kepada Allah, bukan menyenangkan bagi manusia. Kami tidak menentang lagu yang indah, tetapi pujian dalam gereja haruslah memiliki teks atau lirik yang Alkitabiah, musik yang rohani (Ef. 5:19) dan menyenangkan Tuhan, yang tidak terkontaminasi oleh dunia ini (misalnya Rock and Roll) (Rom. 12:1-2; Yak. 4:4), dan cara menyanyi yang rohani. Musik gereja bukanlah untuk tujuan entertainment.',
            ],
            [
                'title' => 'Percaya bahwa perpindahan anggota jemaat adalah cerminan kebebasan berpikir...',
                'content' => 'Percaya bahwa perpindahan anggota jemaat adalah cerminan kebebasan berpikir dan memutuskan (I Tes. 5:21).',
            ],
            [
                'title' => 'Percaya bahwa anggota jemaat harus menjalani kehidupan yang memuliakan nama Tuhan...',
                'content' => 'Percaya bahwa anggota jemaat harus menjalani kehidupan kekristenan yang memuliakan nama Tuhan, sopan, teratur dan kudus (Ibr. 12:14).',
            ],
            [
                'title' => 'Percaya bahwa anti Kristus akan mempersatukan politik, ekonomi dan agama...',
                'content' => 'Percaya bahwa anti Kristus akan mempersatukan politik, ekonomi dan agama serta menguasai. Untuk itu orang Kristen harus waspada (Wah. 13:11-18).',
            ],
            [
                'title' => 'Percaya bahwa hari pengangkatan orang percaya terjadi sebelum masa penganiayaan...',
                'content' => 'Percaya bahwa hari pengangkatan orang percaya (rapture) terjadi sebelum masa penganiayaan (pretribulation) (I Tes. 4:13-5:11). Dan penampakan Kristus terjadi sebelum kerajaan seribu tahun (premillennium) (Wah. 19-20).',
            ],
        ];

        foreach ($creeds as $index => $creed) {
            $number = $index + 1;

            Creed::create([
                ...$creed,
                'number' => $number,
                'sort_order' => $number,
            ]);
        }
    }
}
