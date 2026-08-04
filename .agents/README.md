# GBIA GRAMMATA — Website Gereja

> Website profil dan komunitas jemaat GBIA GRAMMATA GPIB.  
> Dibangun dengan **Laravel**, dirancang modern, bersih, dan elegan.

---

## Deskripsi Proyek

Website ini berfungsi sebagai portal digital resmi Gereja GBIA GRAMMATA GPIB yang mencakup:

- **Halaman Beranda** — Jadwal ibadah, visi-misi, CTA lokasi, dan embed Google Maps.
- **Halaman Profil (Tentang)** — Kata sambutan gembala, sejarah gereja (timeline), tunas jemaat, dan pengakuan iman (accordion).
- **Halaman Warta Jemaat** — Sistem blog dinamis untuk warta mingguan, arsip PDF, dan fitur baca/download.
- **Halaman Pedang Roh** — Etalase arsip majalah dwi-bulanan (2005–sekarang) dengan filter tahun dan pagination.

## Tech Stack

| Layer       | Teknologi                             |
|-------------|---------------------------------------|
| Backend     | Laravel 11.x (PHP 8.2+)              |
| Frontend    | Blade Templates + Tailwind CSS        |
| Database    | MySQL 8.0                             |
| Font        | Merriweather (serif), Inter (sans)    |
| Maps        | Google Maps Embed API                 |
| File Serve  | Laravel Storage (public disk)         |
| Dev Server  | `php artisan serve` / Vite dev server |

## Prasyarat

- PHP >= 8.2
- Composer
- Node.js >= 18 & npm
- MySQL 8.0
- Git

## Instalasi & Setup Lokal

```bash
# 1. Clone repository
git clone <repo-url>
cd gbia-grammata

# 2. Install dependencies
composer install
npm install

# 3. Environment
cp .env.example .env
php artisan key:generate

# 4. Database
#    Buat database MySQL, lalu atur di .env:
#    DB_DATABASE=gbia_grammata
#    DB_USERNAME=root
#    DB_PASSWORD=

# 5. Migrasi & seed
php artisan migrate
php artisan db:seed

# 6. Storage link (untuk akses file publik)
php artisan storage:link

# 7. Jalankan
php artisan serve
npm run dev
```

Akses di `http://localhost:8000`.

## Struktur Proyek (Penting)

```
├── app/
│   ├── Http/Controllers/       # Controller per halaman/fitur
│   ├── Models/                 # Eloquent Models
│   └── Services/               # Business logic (opsional)
├── database/
│   ├── migrations/             # Skema tabel
│   └── seeders/                # Data awal (jadwal, sejarah, dsb.)
├── resources/
│   ├── views/                  # Blade templates
│   │   ├── layouts/            # Layout utama (app.blade.php)
│   │   ├── components/         # Blade components reusable
│   │   ├── home/               # Halaman beranda
│   │   ├── about/              # Halaman profil/tentang
│   │   ├── warta/              # Halaman warta jemaat
│   │   └── pedang-roh/         # Halaman majalah
│   ├── css/                    # Tailwind entry point
│   └── js/                     # JavaScript entry point
├── public/
│   └── storage/                # Symlink ke storage/app/public
├── routes/
│   └── web.php                 # Semua route web
├── storage/
│   └── app/public/             # Upload file (PDF, gambar)
└── docs/                       # Dokumentasi proyek (file .md ini)
```

## File Dokumentasi

| File              | Isi                                          |
|-------------------|----------------------------------------------|
| `README.md`       | Overview proyek (file ini)                   |
| `design.md`       | Design system (warna, tipografi, komponen)   |
| `ui-spec.md`      | Spesifikasi UI per halaman                   |
| `architecture.md` | Arsitektur sistem (frontend, backend, DB)    |
| `database.md`     | Skema tabel & relasi                         |
| `routes.md`       | Daftar endpoint/route Laravel                |
| `components.md`   | Komponen UI reusable (Blade components)      |
| `changelog.md`    | Catatan perubahan/update                     |
| `todo.md`         | Backlog fitur yang belum diimplementasi      |

## Konvensi

- **Bahasa kode**: Inggris (variabel, class, method).
- **Bahasa konten**: Indonesia (teks UI, label, copywriting).
- **Penamaan route**: kebab-case (`warta-jemaat`, `pedang-roh`).
- **Blade component**: kebab-case (`<x-schedule-card />`, `<x-cta-section />`).
- **Commit message**: Conventional Commits (`feat:`, `fix:`, `docs:`).

## Lisensi

Proyek ini bersifat privat untuk kebutuhan internal GBIA GRAMMATA GPIB.
