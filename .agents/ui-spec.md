# UI Specification - Proyek Website Gereja GBIA GRAMMATA

## 1. Halaman Beranda (Home)
Halaman ini dirancang untuk memberikan kesan pertama yang rapi, modern, dan memandu pengunjung tanpa terlihat kaku.

### Bagian Jadwal Ibadah
- **Konsep:** Meninggalkan tabel konvensional. Menggunakan desain *List Cards* atau *Grid Icons*.
- **Visualisasi:** Kotak putih bersih (*card*). Di dalamnya terdapat ikon jam dan *map pin*. Dipadukan dengan tipografi tebal untuk nama ibadah.
- **Layout:** Dieksekusi dengan `flex` atau `grid` di Tailwind.
- **Data Statis:**
  - Kebaktian Umum: Minggu, 09.30 - 11.00 WIB
  - Sekolah Minggu: Minggu, 09.30 - 10.30 WIB
  - Kebaktian Doa: Jumat, 17.30 - 18.30 WIB
  - Pendalaman Alkitab: Sabtu (Minggu ke-4), 18.30 - 20.30 WIB

### Bagian Visi, Misi, dan Tentang
- **Konsep:** Tampilan dalam bentuk 3 *Cards* yang sejajar (Horizontal).
- **Interaksi:** Pada *card* "Tentang", wajib terdapat tombol **"Baca Selengkapnya"** untuk memancing pengunjung mengeksplorasi halaman profil gereja lebih jauh.

### Bagian Call-to-Action (CTA) & Lokasi
- **Konsep:** *Section* khusus dengan *background* warna solid (Biru Tua/Navy).
- **Copywriting:** Teks *headline* berbunyi "Mari Bertumbuh dan Beribadah Bersama Kami!"
- **Interaksi:** Tombol aksi utama (CTA) bertuliskan **"Temukan Kami"**.
- **Integrasi:** Tepat di bawah section ini, disematkan *embed* Google Maps secara *full-width* (lebar layar penuh).

---

## 2. Halaman Profil (Tentang)
Halaman dengan *vibe* hangat, personal, dan bebas *scroll fatigue*.

### Profil / Kata Sambutan Gembala
- **Konsep:** UI *Split-Screen* (2 kolom).
- **Desktop:** Kolom kiri berisi foto keluarga Pak Gembala dengan *frame soft* (sudut *rounded*). Kolom kanan berisi teks pengantar menggunakan tipografi *font serif* yang elegan agar terasa hangat.
- **Mobile:** Tata letak menyesuaikan menjadi tumpukan vertikal (foto di atas, teks di bawah).

### Sejarah Singkat (Timeline)
- **Konsep:** *Vertical Timeline*.
- **Visualisasi:** Garis lurus vertikal di tengah layar. Sebelah kiri garis untuk teks tahun, dan sebelah kanan untuk deskripsi sejarahnya dengan gaya *zig-zag*.

### Tunas Jemaat (3 Lokasi/Gereja)
- **Konsep:** *Layout Horizontal 3 Columns* dengan desain *cards* yang seragam.
- **Visualisasi:** Foto diposisikan di atas, lalu Nama Gereja, dan Nama Pendeta dicetak tebal pada area paling bawah.
- **Mobile:** *Layout* otomatis berubah menjadi vertikal (menumpuk).

### Pengakuan Iman (Perihal Bergabung)
- **Konsep:** Mengelola 31 poin teologi padat untuk menghindari *Scroll Fatigue*.
- **Visualisasi:** Desain *Accordion* (Sistem Buka-Tutup). Tampilkan kalimat awal saja, pengunjung bisa mengklik ikon panah/v untuk melebarkan teks penjelasan secara penuh.

---

## 3. Halaman Warta Jemaat
Mengadopsi gaya *blog* modern dengan aksen merah untuk tanggal/label.

### Daftar Artikel (Dinamis)
- **Konsep:** *Layout blog* kekinian. *Thumbnail* foto diletakkan di sebelah kiri, judul dan cuplikan artikel di sebelah kanan.
- **Interaksi:** Saat diklik, masuk ke halaman detail (foto *header* besar di atas, teks penuh di bawah).

### Arsip Warta (4 Edisi Terakhir)
- **Konsep:** *Sidebar* di sisi kanan atau seksi khusus di bawah dengan judul **"Arsip Warta"**.
- **Logika Sistem:** Menarik otomatis 4 warta PDF terakhir (tanpa mempedulikan batas bulan berjalan). Tiap item dilengkapi tombol unduh.

### Pembacaan PDF Warta
- **Konsep:** Menghindari *embed* PDF langsung untuk mencegah *bug* di perangkat *mobile*.
- **Interaksi:** Dua tombol aksi interaktif: **"Baca di Layar"** (Buka *tab* baru bawaan browser) dan **"Download PDF"**.

---

## 4. Halaman Pedang Roh (Editorial / Majalah)
Ruang publikasi arsip dwi-bulanan.

### Tampilan Etalase Majalah
- **Konsep:** Menyerupai rak majalah dalam bentuk *grid*.
- **Dimensi Kover:** Area gambar disesuaikan dengan proporsi kertas A4 (vertikal/potret). Eksekusi di Tailwind menggunakan `aspect-ratio` khusus potret (contoh: rasio 3:4).

### Navigasi Pencarian Terkombinasi
- **Konsep:** Mengatasi beban muat untuk 126 rilis (2005-2026).
- **Fitur:** 1. **Filter Dropdown Tahun** di bagian atas (contoh: 2024, 2023).
  2. **Pagination** (Halaman 1, 2, 3...) di bagian bawah *grid* untuk mencegah *overload* render kover secara massal.
