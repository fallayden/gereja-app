# [BUG/ENHANCEMENT] Judul Majalah Pedang Roh Terpotong Karena Keterbatasan Ruang

## Deskripsi Masalah
Pada kartu majalah Pedang Roh (`magazine-card`), judul majalah yang panjang mengalami pemotongan teks (*truncation*) karena aturan CSS single-line (`line-clamp-1`). Hal ini membuat judul lengkap tidak dapat dibaca sepenuhnya oleh pengguna.

## Perilaku yang Diharapkan (Expected Behavior)
- Judul majalah harus dapat terbaca sepenuhnya saat pengguna berinteraksi (misalnya mengarahkan kursor/hover ke judul atau kartu).
- Terdapat indikator atau solusi visual yang menarik dan responsif tanpa merusak tata letak (layout) kartu majalah.

## Langkah Perbaikan yang Disarankan (Proposed Solution)
1. **Atribut `title` Bawaan Browser:**
   Tambahkan atribut `title="{{ $title }}"` pada tag judul `<h4>` agar pembaca dapat melihat tooltip judul lengkap secara native saat hover.
2. **Efek Scrolling / Marquee Teks Saat Hover:**
   Terapkan efek animasi scroll teks (*marquee*) atau pergeseran teks ke kiri saat cursor diarahkan (`group-hover`), sehingga teks yang terpotong bergeser secara halus dan dapat dibaca seluruhnya.
3. **Fleksibilitas Multiline Saat Hover:**
   Atau izinkan judul mengembang hingga 2-3 baris (`group-hover:line-clamp-none` / `line-clamp-2`) secara halus saat hover.
