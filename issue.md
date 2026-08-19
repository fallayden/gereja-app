# [BUG] Gagal Unduh File PDF Tanpa IDM ("Couldn't download - No file")

## Deskripsi Masalah
Ketika pengguna mencoba mengunduh file PDF (misalnya Majalah Pedang Roh atau Arsip Warta Jemaat):
- **Menggunakan IDM (Internet Download Manager):** File PDF berhasil di-intersep dan diunduh oleh IDM.
- **Tanpa IDM (Browser Native Download):** Browser (Chrome, Edge, Firefox, dll) gagal mengunduh file dan menampilkan pesan error `"Couldn't download - No file"` atau file tidak ditemukan.

## Penyebab Utama (Root Cause Analysis)
1. **Direct Storage URL tanpa Controller Response:** Link unduhan saat ini menggunakan URL langsung (`asset('storage/' . $path)`) yang sangat bergantung pada symlink `storage` dan konfigurasi web server.
2. **Missing Response Headers (`Content-Type` & `Content-Disposition`):** Penggunaan atribut HTML `download` pada URL langsung sering diabaikan atau diblokir oleh browser jika header HTTP `Content-Disposition: attachment` dan `Content-Type: application/pdf` tidak dikirim secara resmi oleh server.
3. **Potensi Symlink Storage Bermasalah:** Jika symlink `public/storage` tidak dikonfigurasi dengan benar atau file path mengandung spasi/karakter khusus, browser native akan gagal menemukan file tersebut.

## Perilaku yang Diharapkan (Expected Behavior)
- Pengguna dapat mengunduh file PDF dengan lancar langsung dari browser (tanpa harus memasang IDM).
- Browser secara otomatis mengunduh file dengan nama file yang sesuai dan header HTTP yang valid (`Content-Type: application/pdf` & `Content-Disposition: attachment`).

## Langkah Perbaikan yang Disarankan (Proposed Solution)
1. **Buat Dedicated Download Controller / Route:**
   Buat route khusus untuk mengunduh PDF (misal: `GET /download/magazine/{id}` dan `GET /download/archive/{id}`) yang mereturn `Storage::download($path, $filename, $headers)`.
2. **Perbarui Link Komponen Front-End:**
   Ganti link `downloadUrl` di komponen `magazine-card`, `archive-item`, dan halaman `warta` agar mengarah ke Route Download Controller tersebut.
3. **Pastikan Symlink Storage Aktif:**
   Pastikan perintah `php artisan storage:link` telah dijalankan di lingkungan lokal maupun server.
