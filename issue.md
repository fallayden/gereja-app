# [BUG] Ukuran Foto Thumbnail Warta Tidak Konsisten

## Deskripsi Masalah
Terdapat ketidaksesuaian tampilan pada foto thumbnail Warta (Magazine). 
- **Mode Desktop:** Ukuran foto thumbnail terlihat terlalu kecil dan tidak proporsional dengan layout kartu/halaman desktop.
- **Mode Mobile:** Ukuran foto thumbnail terlihat pas dan sesuai dengan proporsi layar perangkat seluler.

## Perilaku yang Diharapkan (Expected Behavior)
- Ukuran foto thumbnail warta harus responsif dan proporsional di semua ukuran layar (Desktop, Tablet, dan Mobile).
- Pada mode Desktop, thumbnail warta memiliki tinggi/lebar yang pas (misalnya menggunakan `aspect-ratio` atau utilitas responsif yang sesuai seperti `h-48 md:h-64` atau `aspect-[3/4]`/`aspect-[4/3]`) agar konten tidak terlihat kekecilan atau terdistorsi.

## Detail Lokasi & Komponen Terkait
- Komponen tampilan warta: `resources/views/components/magazine-card.blade.php` atau file tampilan warta terkait.
- CSS/Tailwind Class pada tag `<img>` atau container thumbnail warta.

## Langkah Perbaikan yang Disarankan (Proposed Solution)
1. Periksa class Tailwind / CSS pada elemen image/container thumbnail warta.
2. Sesuaikan utility class responsif (misal: ganti fixed height/width yang terlalu kecil di layar sedang/besar dengan breakpoint responsif `md:` dan `lg:`).
3. Pastikan `object-cover` atau `object-contain` digunakan secara konsisten agar gambar tidak mengalami *stretching* (distorsi aspek rasio).
