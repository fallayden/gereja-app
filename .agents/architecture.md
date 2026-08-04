# Architecture — GBIA GRAMMATA Website

> Dokumen ini menjelaskan arsitektur sistem secara keseluruhan.  
> Digunakan sebagai referensi untuk implementasi dan onboarding AI assistant.

---

## Diagram Arsitektur

```
┌─────────────────────────────────────────────────────────┐
│                      CLIENT (Browser)                   │
│  ┌─────────────────────────────────────────────────┐    │
│  │  Blade Templates + Tailwind CSS + Alpine.js     │    │
│  │  (Server-Side Rendered HTML)                    │    │
│  └────────────────────┬────────────────────────────┘    │
└───────────────────────┼─────────────────────────────────┘
                        │ HTTP Request/Response
┌───────────────────────┼─────────────────────────────────┐
│                 LARAVEL APPLICATION                      │
│                                                         │
│  ┌──────────┐  ┌──────────────┐  ┌───────────────┐     │
│  │  Routes   │→│  Controllers  │→│    Views       │     │
│  │ (web.php) │  │              │  │ (Blade)       │     │
│  └──────────┘  └──────┬───────┘  └───────────────┘     │
│                       │                                  │
│               ┌───────▼───────┐                         │
│               │    Models     │                         │
│               │  (Eloquent)   │                         │
│               └───────┬───────┘                         │
│                       │                                  │
│               ┌───────▼───────┐                         │
│               │   Services    │  (opsional, untuk       │
│               │               │   logic kompleks)       │
│               └───────────────┘                         │
└───────────────────────┼─────────────────────────────────┘
                        │ Query
┌───────────────────────┼─────────────────────────────────┐
│                    MySQL 8.0                             │
│  Database: gbia_grammata                                │
└─────────────────────────────────────────────────────────┘
                        │
┌───────────────────────┼─────────────────────────────────┐
│               Laravel Storage (Filesystem)              │
│  storage/app/public/  →  public/storage/ (symlink)      │
│  ├── warta/           # PDF warta jemaat                │
│  ├── pedang-roh/      # PDF/cover majalah               │
│  └── images/          # Foto gembala, gereja, dsb.      │
└─────────────────────────────────────────────────────────┘
```

---

## 1. Frontend Layer

### Rendering: Server-Side (Blade)
- Semua halaman di-render di server menggunakan **Blade Templates**.
- Tidak menggunakan SPA framework (React/Vue). Halaman bersifat multi-page.
- Vite digunakan sebagai asset bundler untuk CSS (Tailwind) dan JS.

### Styling: Tailwind CSS
- Mengikuti design system yang didefinisikan di `design.md`.
- Warna kustom ditambahkan di `tailwind.config.js`:
  - `primary: '#1E3A8A'` (Navy)
  - `secondary: '#4B5563'` (Slate Gray)
  - `tertiary: '#DC2626'` (Merah Aksen)
  - `neutral: '#F8FAFC'` (Off-White)
  - `surface: '#FFFFFF'` (White)
- Font: Merriweather (display/heading), Inter (body/label) — via Google Fonts CDN.

### Interaktivitas: Alpine.js (Minimal)
- Digunakan untuk interaksi ringan tanpa full JS framework:
  - Accordion buka-tutup (Pengakuan Iman).
  - Mobile menu toggle.
  - Dropdown filter tahun (Pedang Roh).
- Tidak ada state management kompleks.

### Responsivitas
- **Mobile-first** approach.
- Breakpoints mengikuti default Tailwind (`sm`, `md`, `lg`, `xl`).
- Layout berubah dari stack (mobile) ke multi-column (desktop).

---

## 2. Backend Layer

### Framework: Laravel 11.x
- Mengikuti pola **MVC** (Model-View-Controller).
- PHP >= 8.2 required.

### Controller

| Controller              | Halaman            | Tanggung Jawab                                    |
|------------------------|--------------------|---------------------------------------------------|
| `HomeController`       | Beranda            | Ambil jadwal ibadah, render home view             |
| `AboutController`      | Profil/Tentang     | Ambil data gembala, sejarah, tunas jemaat, iman   |
| `WartaController`      | Warta Jemaat       | CRUD warta, list artikel, arsip PDF               |
| `PedangRohController`  | Pedang Roh         | List majalah, filter tahun, pagination            |
| `Admin\*Controller`    | Admin Panel        | Manajemen konten (CRUD) — future                  |

### Model

| Model            | Tabel              | Deskripsi                              |
|------------------|--------------------|----------------------------------------|
| `Schedule`       | `schedules`        | Jadwal ibadah                          |
| `Article`        | `articles`         | Warta jemaat (blog post)               |
| `Magazine`       | `magazines`        | Edisi majalah Pedang Roh               |
| `History`        | `histories`        | Timeline sejarah gereja                |
| `BranchChurch`   | `branch_churches`  | Tunas jemaat (3 lokasi)                |
| `Creed`          | `creeds`           | Butir pengakuan iman                   |
| `PastorProfile`  | `pastor_profiles`  | Profil gembala                         |

### Middleware
- Middleware default Laravel (CSRF, session, dll).
- Untuk admin panel (future): `auth` middleware + role checking.

### File Storage
- Menggunakan `public` disk Laravel.
- File disimpan di `storage/app/public/` dan diakses via symlink `public/storage/`.
- Kategori folder:
  - `warta/` — PDF warta jemaat
  - `pedang-roh/` — Cover image & PDF majalah
  - `images/` — Foto umum (gembala, gereja, dsb.)

---

## 3. Database Layer

### Engine: MySQL 8.0
- Charset: `utf8mb4` (mendukung emoji & karakter Indonesia).
- Collation: `utf8mb4_unicode_ci`.

### Skema
- Detail lengkap ada di `database.md`.
- Menggunakan Laravel Migrations untuk version control skema.
- Data awal (statis) di-load via Seeders.

### Relasi Utama
```
articles ──── 1:N ──── article_attachments (PDF lampiran)
magazines ─── standalone (cover_path, file_path)
histories ─── standalone (year, description)
schedules ─── standalone (name, day, time, location)
```

---

## 4. Asset Pipeline

### Vite (Laravel Vite Plugin)
- Entry points:
  - `resources/css/app.css` → Tailwind directives
  - `resources/js/app.js` → Alpine.js + custom JS
- Build output ke `public/build/`.
- Di development: `npm run dev` (HMR aktif).
- Di production: `npm run build`.

### Referensi di Blade
```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

---

## 5. Environment & Deployment

### Development
- `php artisan serve` → port 8000
- `npm run dev` → Vite HMR
- Database lokal MySQL

### Production (Rencana)
- Shared hosting / VPS dengan Nginx + PHP-FPM.
- `npm run build` untuk compile asset.
- `php artisan optimize` untuk cache config/route/view.
- SSL via Let's Encrypt.

---

## 6. Keputusan Arsitektur

| Keputusan                         | Alasan                                                     |
|-----------------------------------|------------------------------------------------------------|
| Blade (bukan SPA)                 | Konten statis-heavy, SEO penting, tim kecil                |
| Tailwind CSS                      | Rapid prototyping, konsisten dengan design system           |
| Alpine.js (bukan Vue/React)       | Interaktivitas minimal, menghindari overhead SPA            |
| Public disk (bukan S3)            | Skala kecil, hosting sederhana, budget terbatas             |
| Seeder untuk data statis          | Jadwal & sejarah jarang berubah, cukup di-seed             |
| MySQL (bukan PostgreSQL/SQLite)   | Kompatibilitas hosting Indonesia, familiar bagi developer   |
