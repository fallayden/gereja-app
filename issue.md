# [BUG] Tombol "Baca di Layar" Selalu Memicu Download (Tidak Bisa Dilihat Inline)

## Deskripsi Masalah
Ketika pengguna mengklik tombol **"Baca di Layar"** atau **"Baca di Layar (Tab Baru)"** pada Majalah Pedang Roh maupun Arsip Warta Jemaat:
- **Perilaku Saat Ini:** Browser langsung mengunduh (download) file PDF ke penyimpanan perangkat pengguna, alih-alih membuka dan menampilkan pratinjau (preview) PDF di tab baru browser.

## Penyebab Utama (Root Cause Analysis)
1. **Header HTTP `Content-Disposition` Tidak Menggunakan `inline`:**
   Pada controller (`PedangRohController::view` dan `WartaController::viewAttachment`), response yang dikembalikan belum secara eksplisit menyertakan header HTTP:
   ```php
   'Content-Disposition' => 'inline; filename="' . $fileName . '"'
   ```
   Tanpa header `inline`, banyak browser (dan ekstensi pengunduh) secara otomatis memperlakukan file PDF sebagai *attachment* sehingga langsung memaksa pengunduhan.
2. **Kesesuaian Atribut HTML Link:**
   Perlu dipastikan tombol "Baca di Layar" tidak memiliki atribut `download` di HTML tag `<a>`, serta membuka di tab baru (`target="_blank"`).

## Perilaku yang Diharapkan (Expected Behavior)
- Pengguna yang mengklik **"Baca di Layar"** akan dibukakan tab baru di browser tempat PDF dapat langsung dibaca secara *inline* menggunakan PDF Viewer bawaan browser.
- Pengguna yang mengklik **"Download PDF"** / **"Unduh Majalah"** tetap mengunduh file secara langsung ke perangkat.

## Langkah Perbaikan yang Disarankan (Proposed Solution)
1. **Perbarui Response Header di Controller (`PedangRohController` & `WartaController`):**
   Pada method `view()` dan `viewAttachment()`, kembalikan response dengan header `Content-Disposition: inline` dan `Content-Type: application/pdf`:
   ```php
   return response()->file(storage_path('app/public/' . $path), [
       'Content-Type' => 'application/pdf',
       'Content-Disposition' => 'inline; filename="' . $filename . '"',
   ]);
   ```
2. **Periksa Komponen Frontend:**
   Pastikan tag `<a>` pada tombol "Baca di Layar" di `archive-item.blade.php` dan `pedang-roh/index.blade.php` tidak menyertakan atribut `download` dan menggunakan `target="_blank"`.
