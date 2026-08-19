<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleAttachment;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Katak Sebagai Penghasil Zat Obat',
                'slug' => 'katak-sebagai-penghasil-zat-obat',
                'excerpt' => 'Penemuan ilmiah mengenai kulit katak penghasil alkaloid rumit yang membantah teori evolusi dan membuktikan rancangan Sang Pencipta.',
                'body' => '<p>Pada tahun 1974 dunia ilmu pengetahuan cukup terkejut ketika sekelompok ilmuwan dari dunia kedokteran dan farmakologi berhasil menganalisis dan mengidentifikasi substansi yang terdapat pada kulit seekor katak panah beracun (<em>Dendrobates</em>) dari hutan tropis Amerika Selatan.</p>
<p>Ternyata, kulit katak kecil yang panjangnya rata-rata hanya 4 cm ini menghasilkan tidak kurang dari 200 jenis alkaloid yang sangat rumit komposisinya. Beberapa di antaranya terbukti memiliki sifat <strong>anestetik</strong> (penghilang rasa sakit) yang 200 kali lebih kuat dari morfin, sementara yang lain bersifat <strong>antiseptik</strong> alami.</p>
<p>Para ilmuwan evolusionis tentu menghadapi tantangan besar ketika harus menjelaskan bagaimana seekor katak berukuran mini mampu "mengembangkan" ratusan senyawa kimiawi kompleks melalui mekanisme mutasi acak dan seleksi alam. Fakta ini justru lebih masuk akal jika dipahami sebagai karya rancangan Sang Pencipta yang mahacerdas.</p>
<p>Alkitab berkata: <em>"Betapa banyaknya perbuatan-Mu, ya TUHAN, sekaliannya Kaujadikan dengan kebijaksanaan, bumi penuh dengan ciptaan-Mu"</em> (Mazmur 104:24). Keajaiban yang terdapat pada makhluk sekecil katak pun menjadi saksi bisu akan kebesaran dan kecerdasan Sang Perancang Agung.</p>',
                'thumbnail' => null,
                'published_at' => '2026-07-05 00:00:00',
                'is_published' => true,
                'pdf_file_name' => 'Warta GBIA Grammata Edisi 1362 - 05 Juli 2026.pdf',
            ],
            [
                'title' => 'Satu Kaki dan Sebuah Layar',
                'slug' => 'satu-kaki-dan-sebuah-layar',
                'excerpt' => 'Kerang air tawar Asia yang berpindah dengan berlayar menggunakan satu kaki dan arus air, membuktikan keseimbangan alam rancangan Allah.',
                'body' => '<p>Pernahkah Anda mendengar tentang kerang air tawar Asia (<em>Corbicula fluminea</em>) yang memiliki kemampuan unik untuk "berlayar"? Makhluk kecil bercangkang ini ternyata menyimpan rahasia luar biasa dalam mekanisme perpindahannya.</p>
<p>Kerang ini menggunakan <strong>satu kaki</strong> yang dapat dijulurkan keluar dari cangkangnya. Kaki tersebut berfungsi ganda: sebagai jangkar yang menancap ke dasar sungai, dan juga sebagai "layar" yang menangkap arus air untuk mendorongnya berpindah tempat. Suatu desain yang sangat efisien dan cerdik.</p>
<p>Bagaimana mungkin mekanisme rumit ini berkembang secara bertahap melalui mutasi acak? Jika kakinya belum sempurna, kerang tidak bisa berpindah. Jika cangkangnya tidak dirancang untuk membuka dan menutup dengan presisi, mekanisme layarnya tidak akan berfungsi. Semua komponen harus ada secara bersamaan — menunjukkan desain yang utuh dari awal.</p>
<p>Keseimbangan alam ini mengingatkan kita pada pernyataan Alkitab: <em>"Sebab apa yang tidak nampak dari pada-Nya, yaitu kekuatan-Nya yang kekal dan keilahian-Nya, dapat nampak kepada pikiran dari karya-Nya sejak dunia diciptakan"</em> (Roma 1:20).</p>',
                'thumbnail' => null,
                'published_at' => '2026-07-12 00:00:00',
                'is_published' => true,
                'pdf_file_name' => 'Warta GBIA Grammata Edisi 1363 - 12 Juli 2026.pdf',
            ],
            [
                'title' => 'Burung Buaya',
                'slug' => 'burung-buaya',
                'excerpt' => 'Hubungan simbiotik unik antara burung buaya dan buaya sebagai bukti kerja sama ciptaan Allah yang tidak dapat dijelaskan oleh evolusi.',
                'body' => '<p>Di tepi sungai Nil dan rawa-rawa Afrika, terdapat pemandangan yang menakjubkan: seekor burung kecil bernama <strong>Pluvianus aegyptius</strong> (atau dikenal sebagai burung buaya / <em>Egyptian Plover</em>) dengan tenang melompat masuk ke mulut buaya yang terbuka lebar.</p>
<p>Buaya membuka mulutnya bukan untuk memangsa burung tersebut, melainkan untuk "memberi izin" sang burung membersihkan sisa-sisa daging dan parasit yang menempel di gigi-giginya. Ini adalah contoh klasik <strong>simbiosis mutualisme</strong> — keduanya saling menguntungkan.</p>
<p>Yang menakjubkan adalah: bagaimana burung kecil ini "tahu" bahwa mulut buaya aman untuk dimasuki? Dan bagaimana buaya "memutuskan" untuk tidak menutup mulutnya saat burung sedang di dalam? Mekanisme kepercayaan dan kerja sama ini begitu kompleks sehingga sangat sulit untuk dijelaskan sebagai hasil kebetulan evolusioner.</p>
<p>Hubungan simbiotik seperti ini menunjukkan adanya <strong>Perancang</strong> yang mendesain kedua makhluk ini untuk saling melengkapi. Sebagaimana Alkitab menyatakan: <em>"Allah melihat segala yang dijadikan-Nya itu, sungguh amat baik"</em> (Kejadian 1:31).</p>',
                'thumbnail' => null,
                'published_at' => '2026-07-19 00:00:00',
                'is_published' => true,
                'pdf_file_name' => 'Warta GBIA Grammata Edisi 1364 - 19 Juli 2026.pdf',
            ],
            [
                'title' => 'SpudCell: Apakah Para Ilmuwan Berhasil Membangun Sel Hidup?',
                'slug' => 'spudcell-apakah-para-ilmuwan-berhasil-membangun-sel-hidup',
                'excerpt' => 'Tanggapan terhadap eksperimen sel sintetis SpudCell yang menegaskan bahwa sel kompleks membutuhkan Perancang Super Cerdas.',
                'body' => '<p>Pada awal tahun 2026, tim ilmuwan dari University of Minnesota menggemparkan dunia sains dengan mengumumkan keberhasilan mereka menciptakan "<strong>SpudCell</strong>" — sebuah entitas seluler sintetis yang diklaim sebagai "sel buatan pertama yang fungsional".</p>
<p>Namun, perlu dicermati dengan seksama: apa yang sebenarnya mereka ciptakan? SpudCell bukanlah sel hidup yang sesungguhnya. Ia adalah konstruksi buatan yang meniru beberapa fungsi sel — seperti membran lipid dan kemampuan metabolisme dasar — tetapi <strong>tidak memiliki DNA</strong>, tidak dapat bereproduksi secara mandiri, dan tidak memenuhi definisi ilmiah dari "kehidupan" yang sesungguhnya.</p>
<p>Ironisnya, keberhasilan parsial ini justru memperkuat argumen desain cerdas (<em>Intelligent Design</em>). Mengapa? Karena untuk menciptakan sesuatu yang bahkan belum bisa disebut "hidup" saja, dibutuhkan:</p>
<ul>
<li>Laboratorium canggih senilai jutaan dolar</li>
<li>Tim ilmuwan berpendidikan tinggi</li>
<li>Perencanaan dan desain yang presisi</li>
<li>Material kimia murni yang dikontrol ketat</li>
</ul>
<p>Jika kecerdasan manusia saja belum mampu menciptakan satu sel hidup yang sesungguhnya, bagaimana mungkin sel hidup pertama di bumi muncul secara kebetulan tanpa kecerdasan di baliknya? Eksperimen SpudCell ini justru menegaskan bahwa <strong>diperlukan Perancang Super Cerdas</strong> untuk menghadirkan kehidupan.</p>
<p>Alkitab dengan jelas menyatakan: <em>"Pada mulanya Allah menciptakan langit dan bumi"</em> (Kejadian 1:1). Kehidupan bukanlah kebetulan — melainkan rancangan agung dari Sang Pencipta.</p>',
                'thumbnail' => null,
                'published_at' => '2026-07-26 00:00:00',
                'is_published' => true,
                'pdf_file_name' => 'Warta GBIA Grammata Edisi 1365 - 26 Juli 2026.pdf',
            ],
        ];

        foreach ($articles as $data) {
            $pdfFileName = $data['pdf_file_name'];
            unset($data['pdf_file_name']);

            $article = Article::create($data);

            // Create PDF attachment for each article
            ArticleAttachment::create([
                'article_id' => $article->id,
                'file_name' => $pdfFileName,
                'file_path' => 'warta/'.$pdfFileName,
                'file_size' => null,
            ]);
        }
    }
}
