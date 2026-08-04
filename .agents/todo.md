# Todo / Backlog — GBIA GRAMMATA Website

> Daftar fitur yang belum diimplementasi, diurutkan berdasarkan prioritas dan fase.  
> Gunakan file ini sebagai panduan urutan kerja.

---

## Legenda

- `[ ]` — Belum dikerjakan
- `[/]` — Sedang dikerjakan
- `[x]` — Selesai
- 🔴 — Prioritas tinggi (harus selesai untuk MVP)
- 🟡 — Prioritas sedang
- 🟢 — Prioritas rendah / nice-to-have

---

## Fase 0: Setup & Fondasi ✅

- [x] Inisialisasi proyek Laravel
- [x] Konfigurasi `.env` dan koneksi database
- [x] Proyek berjalan di lokal (`php artisan serve`)
- [x] Buat file `design.md` (design system)
- [x] Buat file `ui-spec.md` (spesifikasi UI)
- [x] Buat file dokumentasi tambahan (README, architecture, database, routes, components, changelog, todo)

---

## Fase 1: Database & Model 🔴

- [ ] 🔴 Buat migration `schedules`
- [ ] 🔴 Buat migration `articles`
- [ ] 🔴 Buat migration `article_attachments`
- [ ] 🔴 Buat migration `magazines`
- [ ] 🔴 Buat migration `histories`
- [ ] 🔴 Buat migration `branch_churches`
- [ ] 🔴 Buat migration `creeds`
- [ ] 🔴 Buat migration `pastor_profiles`
- [ ] 🔴 Jalankan `php artisan migrate`
- [ ] 🔴 Buat Eloquent Model: `Schedule`, `Article`, `ArticleAttachment`, `Magazine`, `History`, `BranchChurch`, `Creed`, `PastorProfile`
- [ ] 🔴 Definisikan relasi di model (Article → ArticleAttachment)
- [ ] 🔴 Buat Seeder: `ScheduleSeeder` (4 jadwal ibadah)
- [ ] 🔴 Buat Seeder: `HistorySeeder` (timeline sejarah)
- [ ] 🔴 Buat Seeder: `BranchChurchSeeder` (3 tunas jemaat)
- [ ] 🔴 Buat Seeder: `CreedSeeder` (31 butir pengakuan iman)
- [ ] 🔴 Buat Seeder: `PastorProfileSeeder` (1 profil gembala)
- [ ] 🔴 Update `DatabaseSeeder` untuk memanggil semua seeder

---

## Fase 2: Layout & Komponen Dasar 🔴

- [ ] 🔴 Setup Tailwind CSS dengan custom colors dari `design.md`
- [ ] 🔴 Tambahkan Google Fonts (Merriweather + Inter) di layout
- [ ] 🔴 Buat `<x-app-layout>` (layout utama dengan head, slot, scripts)
- [ ] 🔴 Buat `<x-navbar>` (navigasi responsif dengan mobile menu)
- [ ] 🔴 Buat `<x-footer>` (footer website)
- [ ] 🔴 Buat `<x-button>` (primary & secondary variant)
- [ ] 🔴 Buat `<x-card>` (container card general-purpose)
- [ ] 🔴 Buat `<x-section-heading>` (heading section dengan garis dekoratif)
- [ ] 🟡 Install & konfigurasi Alpine.js

---

## Fase 3: Halaman Beranda 🔴

- [ ] 🔴 Buat `HomeController@index`
- [ ] 🔴 Buat route `GET /` → `home`
- [ ] 🔴 Buat view `home/index.blade.php`
- [ ] 🔴 Buat `<x-schedule-card>` dan tampilkan 4 jadwal ibadah
- [ ] 🔴 Buat `<x-visi-misi-card>` — 3 card horizontal (Visi, Misi, Tentang)
- [ ] 🔴 Tombol "Baca Selengkapnya" pada card Tentang → link ke `/tentang`
- [ ] 🔴 Buat `<x-cta-section>` — CTA dengan background navy
- [ ] 🔴 Buat `<x-google-map>` — embed Google Maps full-width
- [ ] 🟡 Animasi smooth scroll ke section lokasi saat CTA diklik
- [ ] 🟢 Micro-animation pada card hover

---

## Fase 4: Halaman Profil / Tentang 🔴

- [ ] 🔴 Buat `AboutController@index`
- [ ] 🔴 Buat route `GET /tentang` → `about`
- [ ] 🔴 Buat view `about/index.blade.php`
- [ ] 🔴 Section Kata Sambutan Gembala — split-screen (foto kiri, teks kanan)
- [ ] 🔴 Responsive: stack vertikal di mobile
- [ ] 🔴 Buat `<x-timeline-item>` dan render vertical timeline sejarah
- [ ] 🔴 Buat `<x-branch-church-card>` — 3 card tunas jemaat horizontal
- [ ] 🔴 Buat `<x-accordion>` dengan Alpine.js untuk Pengakuan Iman
- [ ] 🔴 Render 31 butir accordion dari data seeder
- [ ] 🟡 Animasi transisi buka-tutup accordion

---

## Fase 5: Halaman Warta Jemaat 🔴

- [ ] 🔴 Buat `WartaController` (index, show, arsip, download)
- [ ] 🔴 Buat route group `/warta-jemaat`
- [ ] 🔴 Buat view `warta/index.blade.php` — list artikel (thumbnail + excerpt)
- [ ] 🔴 Buat `<x-article-card>` dengan layout horizontal
- [ ] 🔴 Tanggal warna merah aksen
- [ ] 🔴 Buat view `warta/show.blade.php` — detail artikel (header image + body)
- [ ] 🔴 Buat `<x-archive-item>` — 4 PDF warta terakhir di sidebar/section
- [ ] 🔴 Tombol "Baca di Layar" (buka tab baru) + "Download PDF"
- [ ] 🔴 Implementasi download file dari storage
- [ ] 🟡 Pagination pada list warta

---

## Fase 6: Halaman Pedang Roh 🔴

- [ ] 🔴 Buat `PedangRohController` (index, download)
- [ ] 🔴 Buat route group `/pedang-roh`
- [ ] 🔴 Buat view `pedang-roh/index.blade.php` — grid etalase majalah
- [ ] 🔴 Buat `<x-magazine-card>` dengan aspect-ratio 3:4 (potret)
- [ ] 🔴 Filter dropdown tahun (Alpine.js atau query parameter)
- [ ] 🔴 Pagination (12 item per halaman, Laravel paginator)
- [ ] 🔴 Download PDF majalah dari storage
- [ ] 🟡 Hover effect pada cover majalah (scale + shadow)

---

## Fase 7: Polish & Responsivitas 🟡

- [ ] 🟡 Test semua halaman di viewport: mobile (375px), tablet (768px), desktop (1280px)
- [ ] 🟡 Fix layout issues di breakpoint transisi
- [ ] 🟡 Tambahkan loading state / skeleton untuk konten dinamis
- [ ] 🟡 Optimasi gambar (lazy loading, WebP format)
- [ ] 🟡 Tambahkan favicon dan Open Graph meta tags
- [ ] 🟡 Test navigasi antar halaman
- [ ] 🟢 Tambahkan micro-animations (fade-in saat scroll, hover transitions)
- [ ] 🟢 Dark mode (opsional)

---

## Fase 8: Admin Panel 🟡

- [ ] 🟡 Setup auth scaffolding (login page)
- [ ] 🟡 Buat admin layout terpisah
- [ ] 🟡 CRUD Warta Jemaat (create, edit, delete artikel + upload PDF)
- [ ] 🟡 CRUD Pedang Roh (upload edisi baru, edit, delete)
- [ ] 🟡 Kelola Jadwal Ibadah (edit jadwal)
- [ ] 🟡 Edit Profil Gembala (update foto & teks sambutan)
- [ ] 🟢 Dashboard admin dengan statistik sederhana
- [ ] 🟢 Rich text editor untuk body artikel (TinyMCE / Trix)

---

## Fase 9: Deployment & Production 🟡

- [ ] 🟡 Konfigurasi hosting (VPS / shared hosting)
- [ ] 🟡 Setup Nginx + PHP-FPM
- [ ] 🟡 SSL certificate (Let's Encrypt)
- [ ] 🟡 `npm run build` untuk compile asset
- [ ] 🟡 `php artisan optimize` (cache config, route, view)
- [ ] 🟡 Setup backup database otomatis
- [ ] 🟢 Monitoring & error logging (Sentry / Laravel Telescope)
- [ ] 🟢 Setup CI/CD pipeline

---

## Catatan Dependensi Antar Fase

```
Fase 0 (Setup) ✅
    └── Fase 1 (Database & Model)
         └── Fase 2 (Layout & Komponen)
              ├── Fase 3 (Beranda)
              ├── Fase 4 (Profil/Tentang)
              ├── Fase 5 (Warta Jemaat)
              └── Fase 6 (Pedang Roh)
                   └── Fase 7 (Polish)
                        └── Fase 8 (Admin Panel)
                             └── Fase 9 (Deployment)
```

> **Rekomendasi:** Kerjakan secara berurutan Fase 1 → 2 → 3 → 4 → 5 → 6.  
> Fase 7–9 bisa dikerjakan paralel setelah semua halaman publik selesai.
