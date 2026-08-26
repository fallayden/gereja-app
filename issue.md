# [ENHANCEMENT] Optimasi Navigasi Paginasi: Sembunyikan Tombol Non-Aktif (Sebelumnya / Berikutnya)

## 1. Ringkasan (Summary)
Pada halaman publik yang memiliki navigasi halaman / paginasi (seperti daftar **Warta Jemaat** dan arsip **Majalah Pedang Roh**), tombol navigasi `« Sebelumnya` dan `Berikutnya »` saat ini tetap muncul di layar meskipun pengguna berada di batas halaman (halaman pertama atau halaman terakhir). Tombol-tombol non-aktif tersebut tidak dapat diklik (`cursor-not-allowed` / disabled) dan membingungkan pengguna.

Perubahan yang diinginkan:
- **Hilangkan tombol `« Sebelumnya`** jika pengguna sedang berada di halaman pertama (karena tidak ada halaman sebelumnya).
- **Hilangkan tombol `Berikutnya »`** jika pengguna sedang berada di halaman terakhir (karena tidak ada halaman selanjutnya).
- Hanya tampilkan tombol navigasi yang benar-benar fungsional dan dapat digunakan oleh pengunjung.

---

## 2. Kondisi Saat Ini (Current Behavior)
1. **Di Halaman Pertama:**
   - Tombol `« Sebelumnya` tetap dirender sebagai elemen teks/tombol non-aktif berstatus disabled.
   - Pengunjung mengira tombol tersebut dapat ditekan, padahal tidak melakukan aksi apa pun.
2. **Di Halaman Terakhir:**
   - Tombol `Berikutnya »` tetap dirender sebagai elemen non-aktif berstatus disabled.
3. **Penyebab:**
   - Template bawaan paginasi Tailwind pada Laravel (`vendor/pagination/tailwind.blade.php` atau `simple-tailwind.blade.php`) memiliki blok `@else` yang merender `<span class="cursor-not-allowed">` ketika `$paginator->onFirstPage()` bernilai `true` atau ketika `$paginator->hasMorePages()` bernilai `false`.

---

## 3. Perilaku yang Diharapkan (Expected Behavior)
1. **Halaman Pertama (Page 1):**
   - Tombol `« Sebelumnya` **tidak ditampilkan sama sekali**.
   - Tombol `Berikutnya »` tetap tampil jika terdapat halaman lanjutan (`$paginator->hasMorePages()`).
2. **Halaman Terakhir (Last Page):**
   - Tombol `« Sebelumnya` tetap tampil untuk kembali ke halaman sebelumnya.
   - Tombol `Berikutnya »` **tidak ditampilkan sama sekali**.
3. **Halaman Tengah (Multi-page):**
   - Kedua tombol (`« Sebelumnya` dan `Berikutnya »`) tampil dan berfungsi normal.
4. **Hanya 1 Halaman Total:**
   - Kontainer paginasi tidak menampilkan tombol navigasi yang membingungkan (`$paginator->hasPages()` mengontrol tampilan navigasi).
5. **Responsivitas & Tata Letak:**
   - Tata letak tata letak (flexbox layout) tetap seimbang dan rapi di layar mobile maupun desktop meskipun salah satu tombol disembunyikan.

---

## 4. Berkas yang Terdampak (Affected Files)
1. **`resources/views/vendor/pagination/tailwind.blade.php`** (atau template kustom paginasi aplikasi)
   - Sesuaikan bagian mobile (`sm:hidden`) dan desktop (`sm:flex`):
     - Hapus blok `@else` pada kondisi `$paginator->onFirstPage()`.
     - Hapus blok `@else` pada kondisi `$paginator->hasMorePages()`.
2. **`resources/views/warta/index.blade.php`**
   - Memastikan pemanggilan `{{ $articles->links() }}` menggunakan template paginasi yang telah disesuaikan.
3. **`resources/views/pedang-roh/index.blade.php`**
   - Memastikan pemanggilan `{{ $magazines->links() }}` menggunakan template paginasi yang telah disesuaikan.
4. **`tests/Feature/PublicWebsiteTest.php`**
   - Menambahkan pengujian otomatis untuk memverifikasi hilangnya tombol non-aktif pada halaman pertama dan halaman terakhir.

---

## 5. Rencana Langkah Implementasi (Implementation Checklist)
- [ ] Buat / sesuaikan template paginasi kustom di `resources/views/vendor/pagination/tailwind.blade.php`.
- [ ] Hapus render elemen `<span>` disabled untuk `pagination.previous` saat berada di halaman pertama (`$paginator->onFirstPage()`).
- [ ] Hapus render elemen `<span>` disabled untuk `pagination.next` saat tidak ada halaman berikutnya (`!$paginator->hasMorePages()`).
- [ ] Pastikan styling flexbox tetap rapi (misalnya tombol berikutnya tetap rata kanan saat tombol sebelumnya tidak ada).
- [ ] Buat automated test di `tests/Feature/PublicWebsiteTest.php`:
  - Assert halaman 1: `assertDontSeeText('Sebelumnya')` dan `assertSeeText('Berikutnya')` (bila data > 1 halaman).
  - Assert halaman terakhir: `assertSeeText('Sebelumnya')` dan `assertDontSeeText('Berikutnya')`.
- [ ] Jalankan `php artisan test` untuk memastikan semua pengujian berjalan sukses.

---

## 6. Kriteria Penerimaan (Acceptance Criteria)
- [x] Tombol `« Sebelumnya` tidak terlihat di halaman pertama.
- [x] Tombol `Berikutnya »` tidak terlihat di halaman terakhir.
- [x] Tombol hanya muncul ketika memiliki tautan halaman yang valid untuk dikunjungi.
- [x] Navigasi tetap fungsional di tampilan mobile dan desktop.
- [x] Seluruh unit/feature test lulus tanpa kegagalan (`php artisan test`).
